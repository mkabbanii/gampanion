<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['roles', 'media'])->get();

        $roles = Role::get();

        return view('frontend.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        return view('frontend.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        foreach ($request->input('profile_photos', []) as $file) {
            $user->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('profile_photos');
        }

        foreach ($request->input('photo', []) as $file) {
            $user->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photo');
        }

        if ($request->input('audio', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . $request->input('audio')))->toMediaCollection('audio');
        }

        foreach ($request->input('passport_photos', []) as $file) {
            $user->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('passport_photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }

        return redirect()->route('frontend.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('frontend.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
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

        return redirect()->route('frontend.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'userOrders', 'userReviews', 'userWallets', 'userPayments', 'userGampanions', 'userUserAlerts');

        return view('frontend.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_create') && Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new User();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
