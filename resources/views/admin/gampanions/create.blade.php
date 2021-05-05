@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.gampanion.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.gampanions.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('game') ? 'has-error' : '' }}">
                            <label class="required" for="game_id">{{ trans('cruds.gampanion.fields.game') }}</label>
                            <select class="form-control select2" name="game_id" id="game_id" required>
                                @foreach($games as $id => $game)
                                    <option value="{{ $id }}" {{ old('game_id') == $id ? 'selected' : '' }}>{{ $game }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('game'))
                                <span class="help-block" role="alert">{{ $errors->first('game') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.game_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.gampanion.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                            <label class="required" for="cost">{{ trans('cruds.gampanion.fields.cost') }}</label>
                            <input class="form-control" type="number" name="cost" id="cost" value="{{ old('cost', '') }}" step="1" required>
                            @if($errors->has('cost'))
                                <span class="help-block" role="alert">{{ $errors->first('cost') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.cost_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level') ? 'has-error' : '' }}">
                            <label for="level">{{ trans('cruds.gampanion.fields.level') }}</label>
                            <input class="form-control" type="text" name="level" id="level" value="{{ old('level', 'N/A') }}">
                            @if($errors->has('level'))
                                <span class="help-block" role="alert">{{ $errors->first('level') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.level_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('server') ? 'has-error' : '' }}">
                            <label for="server">{{ trans('cruds.gampanion.fields.server') }}</label>
                            <input class="form-control" type="text" name="server" id="server" value="{{ old('server', 'N/A') }}">
                            @if($errors->has('server'))
                                <span class="help-block" role="alert">{{ $errors->first('server') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.server_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('platform') ? 'has-error' : '' }}">
                            <label for="platform">{{ trans('cruds.gampanion.fields.platform') }}</label>
                            <input class="form-control" type="text" name="platform" id="platform" value="{{ old('platform', '') }}">
                            @if($errors->has('platform'))
                                <span class="help-block" role="alert">{{ $errors->first('platform') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.platform_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('availability') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="availability" value="0">
                                <input type="checkbox" name="availability" id="availability" value="1" {{ old('availability', 0) == 1 ? 'checked' : '' }}>
                                <label for="availability" style="font-weight: 400">{{ trans('cruds.gampanion.fields.availability') }}</label>
                            </div>
                            @if($errors->has('availability'))
                                <span class="help-block" role="alert">{{ $errors->first('availability') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.availability_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                            <label for="photo">{{ trans('cruds.gampanion.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <span class="help-block" role="alert">{{ $errors->first('photo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('discount') ? 'has-error' : '' }}">
                            <label for="discount">{{ trans('cruds.gampanion.fields.discount') }}</label>
                            <input class="form-control" type="number" name="discount" id="discount" value="{{ old('discount', '0') }}" step="1">
                            @if($errors->has('discount'))
                                <span class="help-block" role="alert">{{ $errors->first('discount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.discount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('other_game') ? 'has-error' : '' }}">
                            <label for="other_game">{{ trans('cruds.gampanion.fields.other_game') }}</label>
                            <input class="form-control" type="text" name="other_game" id="other_game" value="{{ old('other_game', '') }}">
                            @if($errors->has('other_game'))
                                <span class="help-block" role="alert">{{ $errors->first('other_game') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.other_game_helper') }}</span>
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.gampanions.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
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
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($gampanion) && $gampanion->photo)
      var file = {!! json_encode($gampanion->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
@endsection