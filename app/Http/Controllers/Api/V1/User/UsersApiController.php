<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Illuminate\Support\Facades\DB;


class UsersApiController extends Controller
{
    use MediaUploadingTrait;
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function currentUser(Request $request){
        if (Auth::check())
        {
            if(isset(Auth::guard('api')->user()->id))
            {
                return Auth::guard('api')->user();
            }else{
                $response = ["message" => "authentication error"];
                return response($response, 423);
            }
        }else
        {
            $response = ["message" => "authentication error"];
            return response($response, 424);
        }
    }

    public function update(UpdateUserRequest $request)
    {
        if (Auth::check())
        {
            if(isset(Auth::guard('api')->user()->id))
            {
                $user=User::where('id',Auth::guard('api')->user()->id)->get();
                $user->update($request->all());
                $user->roles()->sync($request->input('roles', []));

                if (count($user->profile_photos) > 0) {
                    foreach ($user->profile_photos as $media) {
                        if (!in_array($media->file_name, $request->input('profile_photos', []))) {
                            $media->delete();
                        }
                    }
                }

                $media = $user->profile_photos->pluck('file_name')->toArray();

                foreach ($request->input('profile_photos', []) as $file) {
                    if (count($media) === 0 || !in_array($file, $media)) {
                        $user->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('profile_photos');
                    }
                }

                if (count($user->photo) > 0) {
                    foreach ($user->photo as $media) {
                        if (!in_array($media->file_name, $request->input('photo', []))) {
                            $media->delete();
                        }
                    }
                }

                $media = $user->photo->pluck('file_name')->toArray();

                foreach ($request->input('photo', []) as $file) {
                    if (count($media) === 0 || !in_array($file, $media)) {
                        $user->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photo');
                    }
                }

                if ($request->input('audio', false)) {
                    if (!$user->audio || $request->input('audio') !== $user->audio->file_name) {
                        if ($user->audio) {
                            $user->audio->delete();
                        }

                        $user->addMedia(storage_path('tmp/uploads/' . $request->input('audio')))->toMediaCollection('audio');
                    }
                } elseif ($user->audio) {
                    $user->audio->delete();
                }

                if (count($user->passport_photos) > 0) {
                    foreach ($user->passport_photos as $media) {
                        if (!in_array($media->file_name, $request->input('passport_photos', []))) {
                            $media->delete();
                        }
                    }
                }

                $media = $user->passport_photos->pluck('file_name')->toArray();

                foreach ($request->input('passport_photos', []) as $file) {
                    if (count($media) === 0 || !in_array($file, $media)) {
                        $user->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('passport_photos');
                    }
                }

                return (new UserResource($user))->response()->setStatusCode(Response::HTTP_CREATED);
            }else{
                abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function delete(int $id){
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id) )
            {
                $user = User::findOrFail($id);
                $user->delete();
                $response = ["message" => "SoftDelete OK "];
                return response($response, 200);
            }
            else{
                abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
                 abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function show (int $id){
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id) )
            {
                return new UserResource(User::with(['userGampanions'])->where('id',$id)->get());
            }
            else{
                abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
                 abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function selectUserEmail (string $email)
    {
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->email) )
            {
                return new UserResource(User::with(['userGampanions'])->where('email',$email)->get());
            }
            else{
                abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
                 abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function recentsUsersPhotos(){
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id) )
            {
                return DB::table('media')
                    ->where('collection_name', '=', "profile_photos")
                    ->orderBy('created_at', 'desc')
                    ->get();
            }else{
                abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function userPhotosById(int $id){
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider=="Yes"))
            {
                return DB::table('media')
                ->where('collection_name', '=', "profile_photos")
                ->where('model_id', '=', $id)
                ->get();
            }else{
                $response = ["message" => "Current user is not provider"];
                return response($response, 423);
            }
        }else{
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function addProfilePhoto(Request $request)
    {
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider=="Yes"))
            {
                $user=User::where('id',Auth::guard('api')->user()->id)->get();

                if ($request->input('profile_photos', false)) {
                    if (!$user->profile_photos || $request->input('profile_photos') !== $user->profile_photos->file_name) {
                        $user->addMedia(storage_path('tmp/uploads/' . $request->input('profile_photos')))->toMediaCollection('profile_photos');
                    }
                } elseif ($user->profile_photos) {
                    $user->profile_photos->delete();
                }

                return (new UserResource($user))->response()->setStatusCode(Response::HTTP_ACCEPTED);
            }else{
                return response()->json(['errors' => 'Current user is not a provider'], 401);
            }
        }else{
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

}
