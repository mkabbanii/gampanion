@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('full_name') ? 'has-error' : '' }}">
                            <label for="full_name">{{ trans('cruds.user.fields.full_name') }}</label>
                            <input class="form-control" type="text" name="full_name" id="full_name" value="{{ old('full_name', '') }}">
                            @if($errors->has('full_name'))
                                <span class="help-block" role="alert">{{ $errors->first('full_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.full_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            @if($errors->has('password'))
                                <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('birth_day') ? 'has-error' : '' }}">
                            <label for="birth_day">{{ trans('cruds.user.fields.birth_day') }}</label>
                            <input class="form-control date" type="text" name="birth_day" id="birth_day" value="{{ old('birth_day') }}">
                            @if($errors->has('birth_day'))
                                <span class="help-block" role="alert">{{ $errors->first('birth_day') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.birth_day_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.user.fields.gender') }}</label>
                            @foreach(App\Models\User::GENDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }}>
                                    <label for="gender_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('gender'))
                                <span class="help-block" role="alert">{{ $errors->first('gender') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('profile_photos') ? 'has-error' : '' }}">
                            <label for="profile_photos">{{ trans('cruds.user.fields.profile_photos') }}</label>
                            <div class="needsclick dropzone" id="profile_photos-dropzone">
                            </div>
                            @if($errors->has('profile_photos'))
                                <span class="help-block" role="alert">{{ $errors->first('profile_photos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.profile_photos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                            <label for="photo">{{ trans('cruds.user.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <span class="help-block" role="alert">{{ $errors->first('photo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
                            <label for="about">{{ trans('cruds.user.fields.about') }}</label>
                            <input class="form-control" type="text" name="about" id="about" value="{{ old('about', '') }}">
                            @if($errors->has('about'))
                                <span class="help-block" role="alert">{{ $errors->first('about') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.about_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.user.fields.is_active') }}</label>
                            @foreach(App\Models\User::IS_ACTIVE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_active_{{ $key }}" name="is_active" value="{{ $key }}" {{ old('is_active', '0') === (string) $key ? 'checked' : '' }}>
                                    <label for="is_active_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_active'))
                                <span class="help-block" role="alert">{{ $errors->first('is_active') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.is_active_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                            <label for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="roles[]" id="roles" multiple>
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <span class="help-block" role="alert">{{ $errors->first('roles') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_blocked') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.user.fields.is_blocked') }}</label>
                            @foreach(App\Models\User::IS_BLOCKED_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_blocked_{{ $key }}" name="is_blocked" value="{{ $key }}" {{ old('is_blocked', '0') === (string) $key ? 'checked' : '' }}>
                                    <label for="is_blocked_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_blocked'))
                                <span class="help-block" role="alert">{{ $errors->first('is_blocked') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.is_blocked_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_provider') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.user.fields.is_provider') }}</label>
                            @foreach(App\Models\User::IS_PROVIDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_provider_{{ $key }}" name="is_provider" value="{{ $key }}" {{ old('is_provider', '0') === (string) $key ? 'checked' : '' }}>
                                    <label for="is_provider_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_provider'))
                                <span class="help-block" role="alert">{{ $errors->first('is_provider') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.is_provider_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone_verified_at') ? 'has-error' : '' }}">
                            <label for="phone_verified_at">{{ trans('cruds.user.fields.phone_verified_at') }}</label>
                            <input class="form-control datetime" type="text" name="phone_verified_at" id="phone_verified_at" value="{{ old('phone_verified_at') }}">
                            @if($errors->has('phone_verified_at'))
                                <span class="help-block" role="alert">{{ $errors->first('phone_verified_at') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.phone_verified_at_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.user.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('audio') ? 'has-error' : '' }}">
                            <label for="audio">{{ trans('cruds.user.fields.audio') }}</label>
                            <div class="needsclick dropzone" id="audio-dropzone">
                            </div>
                            @if($errors->has('audio'))
                                <span class="help-block" role="alert">{{ $errors->first('audio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.audio_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('language') ? 'has-error' : '' }}">
                            <label for="language">{{ trans('cruds.user.fields.language') }}</label>
                            <input class="form-control" type="text" name="language" id="language" value="{{ old('language', '') }}">
                            @if($errors->has('language'))
                                <span class="help-block" role="alert">{{ $errors->first('language') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.language_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rank') ? 'has-error' : '' }}">
                            <label for="rank">{{ trans('cruds.user.fields.rank') }}</label>
                            <input class="form-control" type="text" name="rank" id="rank" value="{{ old('rank', '') }}">
                            @if($errors->has('rank'))
                                <span class="help-block" role="alert">{{ $errors->first('rank') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.rank_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('become_provider_at') ? 'has-error' : '' }}">
                            <label for="become_provider_at">{{ trans('cruds.user.fields.become_provider_at') }}</label>
                            <input class="form-control datetime" type="text" name="become_provider_at" id="become_provider_at" value="{{ old('become_provider_at') }}">
                            @if($errors->has('become_provider_at'))
                                <span class="help-block" role="alert">{{ $errors->first('become_provider_at') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.become_provider_at_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nationality') ? 'has-error' : '' }}">
                            <label for="nationality">{{ trans('cruds.user.fields.nationality') }}</label>
                            <input class="form-control" type="text" name="nationality" id="nationality" value="{{ old('nationality', '') }}">
                            @if($errors->has('nationality'))
                                <span class="help-block" role="alert">{{ $errors->first('nationality') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.nationality_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('passport_number') ? 'has-error' : '' }}">
                            <label for="passport_number">{{ trans('cruds.user.fields.passport_number') }}</label>
                            <input class="form-control" type="text" name="passport_number" id="passport_number" value="{{ old('passport_number', '') }}">
                            @if($errors->has('passport_number'))
                                <span class="help-block" role="alert">{{ $errors->first('passport_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.passport_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('passport_photos') ? 'has-error' : '' }}">
                            <label for="passport_photos">{{ trans('cruds.user.fields.passport_photos') }}</label>
                            <div class="needsclick dropzone" id="passport_photos-dropzone">
                            </div>
                            @if($errors->has('passport_photos'))
                                <span class="help-block" role="alert">{{ $errors->first('passport_photos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.passport_photos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                            <label for="bank_name">{{ trans('cruds.user.fields.bank_name') }}</label>
                            <input class="form-control" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', '') }}">
                            @if($errors->has('bank_name'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.bank_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bank_account_number') ? 'has-error' : '' }}">
                            <label for="bank_account_number">{{ trans('cruds.user.fields.bank_account_number') }}</label>
                            <input class="form-control" type="text" name="bank_account_number" id="bank_account_number" value="{{ old('bank_account_number', '') }}">
                            @if($errors->has('bank_account_number'))
                                <span class="help-block" role="alert">{{ $errors->first('bank_account_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.bank_account_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('beneficial_name') ? 'has-error' : '' }}">
                            <label for="beneficial_name">{{ trans('cruds.user.fields.beneficial_name') }}</label>
                            <input class="form-control" type="text" name="beneficial_name" id="beneficial_name" value="{{ old('beneficial_name', '') }}">
                            @if($errors->has('beneficial_name'))
                                <span class="help-block" role="alert">{{ $errors->first('beneficial_name') }}</span>
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