@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.user.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.users.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.username') }}
                                    </th>
                                    <td>
                                        {{ $user->username }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email_verified_at') }}
                                    </th>
                                    <td>
                                        {{ $user->email_verified_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.verified') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $user->verified ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.birth_day') }}
                                    </th>
                                    <td>
                                        {{ $user->birth_day }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.gender') }}
                                    </th>
                                    <td>
                                        {{ App\Models\User::GENDER_RADIO[$user->gender] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.profile_photos') }}
                                    </th>
                                    <td>
                                        @foreach($user->profile_photos as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $user->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.photo') }}
                                    </th>
                                    <td>
                                        @foreach($user->photo as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.about') }}
                                    </th>
                                    <td>
                                        {{ $user->about }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\User::IS_ACTIVE_RADIO[$user->is_active] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.roles') }}
                                    </th>
                                    <td>
                                        @foreach($user->roles as $key => $roles)
                                            <span class="label label-info">{{ $roles->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.is_blocked') }}
                                    </th>
                                    <td>
                                        {{ App\Models\User::IS_BLOCKED_RADIO[$user->is_blocked] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.is_provider') }}
                                    </th>
                                    <td>
                                        {{ App\Models\User::IS_PROVIDER_RADIO[$user->is_provider] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.phone_verified_at') }}
                                    </th>
                                    <td>
                                        {{ $user->phone_verified_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $user->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.gps_location') }}
                                    </th>
                                    <td>
                                        {{ $user->gps_location }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.audio') }}
                                    </th>
                                    <td>
                                        @if($user->audio)
                                            <a href="{{ $user->audio->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.bank_name') }}
                                    </th>
                                    <td>
                                        {{ $user->bank_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.bank_account_number') }}
                                    </th>
                                    <td>
                                        {{ $user->bank_account_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.beneficial_name') }}
                                    </th>
                                    <td>
                                        {{ $user->beneficial_name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.users.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection