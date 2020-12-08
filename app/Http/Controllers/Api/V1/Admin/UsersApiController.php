<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource(User::with(['roles'])->get());
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        if ($request->input('profile_photos', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . $request->input('profile_photos')))->toMediaCollection('profile_photos');
        }

        if ($request->input('photo', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($request->input('audio', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . $request->input('audio')))->toMediaCollection('audio');
        }

        if ($request->input('passport_photos', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . $request->input('passport_photos')))->toMediaCollection('passport_photos');
        }

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource($user->load(['roles']));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        if ($request->input('profile_photos', false)) {
            if (!$user->profile_photos || $request->input('profile_photos') !== $user->profile_photos->file_name) {
                if ($user->profile_photos) {
                    $user->profile_photos->delete();
                }

                $user->addMedia(storage_path('tmp/uploads/' . $request->input('profile_photos')))->toMediaCollection('profile_photos');
            }
        } elseif ($user->profile_photos) {
            $user->profile_photos->delete();
        }

        if ($request->input('photo', false)) {
            if (!$user->photo || $request->input('photo') !== $user->photo->file_name) {
                if ($user->photo) {
                    $user->photo->delete();
                }

                $user->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($user->photo) {
            $user->photo->delete();
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

        if ($request->input('passport_photos', false)) {
            if (!$user->passport_photos || $request->input('passport_photos') !== $user->passport_photos->file_name) {
                if ($user->passport_photos) {
                    $user->passport_photos->delete();
                }

                $user->addMedia(storage_path('tmp/uploads/' . $request->input('passport_photos')))->toMediaCollection('passport_photos');
            }
        } elseif ($user->passport_photos) {
            $user->passport_photos->delete();
        }

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
