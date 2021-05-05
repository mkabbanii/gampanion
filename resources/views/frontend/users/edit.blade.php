@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.users.update", [$user->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="full_name">{{ trans('cruds.user.fields.full_name') }}</label>
                            <input class="form-control" type="text" name="full_name" id="full_name" value="{{ old('full_name', $user->full_name) }}">
                            @if($errors->has('full_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('full_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.full_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password">
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="birth_day">{{ trans('cruds.user.fields.birth_day') }}</label>
                            <input class="form-control date" type="text" name="birth_day" id="birth_day" value="{{ old('birth_day', $user->birth_day) }}">
                            @if($errors->has('birth_day'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('birth_day') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.birth_day_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.user.fields.gender') }}</label>
                            @foreach(App\Models\User::GENDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $user->gender) === (string) $key ? 'checked' : '' }}>
                                    <label for="gender_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="profile_photos">{{ trans('cruds.user.fields.profile_photos') }}</label>
                            <div class="needsclick dropzone" id="profile_photos-dropzone">
                            </div>
                            @if($errors->has('profile_photos'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('profile_photos') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.profile_photos_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="photo">{{ trans('cruds.user.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="about">{{ trans('cruds.user.fields.about') }}</label>
                            <input class="form-control" type="text" name="about" id="about" value="{{ old('about', $user->about) }}">
                            @if($errors->has('about'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('about') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.about_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.user.fields.is_active') }}</label>
                            @foreach(App\Models\User::IS_ACTIVE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', $user->is_active) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_active_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_active'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_active') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.is_active_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="roles[]" id="roles" multiple>
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.user.fields.is_blocked') }}</label>
                            @foreach(App\Models\User::IS_BLOCKED_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_blocked_{{ $key }}" name="is_blocked" value="{{ $key }}" {{ old('is_blocked', $user->is_blocked) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_blocked_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_blocked'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_blocked') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.is_blocked_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.user.fields.is_provider') }}</label>
                            @foreach(App\Models\User::IS_PROVIDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_provider_{{ $key }}" name="is_provider" value="{{ $key }}" {{ old('is_provider', $user->is_provider) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_provider_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_provider'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_provider') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.is_provider_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone_verified_at">{{ trans('cruds.user.fields.phone_verified_at') }}</label>
                            <input class="form-control datetime" type="text" name="phone_verified_at" id="phone_verified_at" value="{{ old('phone_verified_at', $user->phone_verified_at) }}">
                            @if($errors->has('phone_verified_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_verified_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.phone_verified_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.user.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $user->address) }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="gps_location">{{ trans('cruds.user.fields.gps_location') }}</label>
                            <input class="form-control" type="text" name="gps_location" id="gps_location" value="{{ old('gps_location', $user->gps_location) }}">
                            @if($errors->has('gps_location'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gps_location') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.gps_location_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="audio">{{ trans('cruds.user.fields.audio') }}</label>
                            <div class="needsclick dropzone" id="audio-dropzone">
                            </div>
                            @if($errors->has('audio'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('audio') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.audio_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="language">{{ trans('cruds.user.fields.language') }}</label>
                            <input class="form-control" type="text" name="language" id="language" value="{{ old('language', $user->language) }}">
                            @if($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.language_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="rank">{{ trans('cruds.user.fields.rank') }}</label>
                            <input class="form-control" type="text" name="rank" id="rank" value="{{ old('rank', $user->rank) }}">
                            @if($errors->has('rank'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('rank') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.rank_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nationality">{{ trans('cruds.user.fields.nationality') }}</label>
                            <input class="form-control" type="text" name="nationality" id="nationality" value="{{ old('nationality', $user->nationality) }}">
                            @if($errors->has('nationality'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nationality') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.nationality_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="passport_number">{{ trans('cruds.user.fields.passport_number') }}</label>
                            <input class="form-control" type="text" name="passport_number" id="passport_number" value="{{ old('passport_number', $user->passport_number) }}">
                            @if($errors->has('passport_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('passport_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.passport_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="passport_photos">{{ trans('cruds.user.fields.passport_photos') }}</label>
                            <div class="needsclick dropzone" id="passport_photos-dropzone">
                            </div>
                            @if($errors->has('passport_photos'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('passport_photos') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.passport_photos_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="bank_name">{{ trans('cruds.user.fields.bank_name') }}</label>
                            <input class="form-control" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $user->bank_name) }}">
                            @if($errors->has('bank_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.bank_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="bank_account_number">{{ trans('cruds.user.fields.bank_account_number') }}</label>
                            <input class="form-control" type="text" name="bank_account_number" id="bank_account_number" value="{{ old('bank_account_number', $user->bank_account_number) }}">
                            @if($errors->has('bank_account_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank_account_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.bank_account_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="beneficial_name">{{ trans('cruds.user.fields.beneficial_name') }}</label>
                            <input class="form-control" type="text" name="beneficial_name" id="beneficial_name" value="{{ old('beneficial_name', $user->beneficial_name) }}">
                            @if($errors->has('beneficial_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('beneficial_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.beneficial_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedProfilePhotosMap = {}
Dropzone.options.profilePhotosDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="profile_photos[]" value="' + response.name + '">')
      uploadedProfilePhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedProfilePhotosMap[file.name]
      }
      $('form').find('input[name="profile_photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($user) && $user->profile_photos)
      var files = {!! json_encode($user->profile_photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="profile_photos[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($user) && $user->photo)
      var files = {!! json_encode($user->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    Dropzone.options.audioDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="audio"]').remove()
      $('form').append('<input type="hidden" name="audio" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="audio"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->audio)
      var file = {!! json_encode($user->audio) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="audio" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedPassportPhotosMap = {}
Dropzone.options.passportPhotosDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="passport_photos[]" value="' + response.name + '">')
      uploadedPassportPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPassportPhotosMap[file.name]
      }
      $('form').find('input[name="passport_photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($user) && $user->passport_photos)
      var files = {!! json_encode($user->passport_photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="passport_photos[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection