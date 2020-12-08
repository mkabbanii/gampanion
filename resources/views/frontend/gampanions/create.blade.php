@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.gampanion.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.gampanions.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="game_id">{{ trans('cruds.gampanion.fields.game') }}</label>
                            <select class="form-control select2" name="game_id" id="game_id" required>
                                @foreach($games as $id => $game)
                                    <option value="{{ $id }}" {{ old('game_id') == $id ? 'selected' : '' }}>{{ $game }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('game'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('game') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.game_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.gampanion.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="cost">{{ trans('cruds.gampanion.fields.cost') }}</label>
                            <input class="form-control" type="number" name="cost" id="cost" value="{{ old('cost', '') }}" step="1" required>
                            @if($errors->has('cost'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cost') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.cost_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="level">{{ trans('cruds.gampanion.fields.level') }}</label>
                            <input class="form-control" type="text" name="level" id="level" value="{{ old('level', 'N/A') }}">
                            @if($errors->has('level'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('level') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.level_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="server">{{ trans('cruds.gampanion.fields.server') }}</label>
                            <input class="form-control" type="text" name="server" id="server" value="{{ old('server', 'N/A') }}">
                            @if($errors->has('server'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('server') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.server_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="platform">{{ trans('cruds.gampanion.fields.platform') }}</label>
                            <input class="form-control" type="text" name="platform" id="platform" value="{{ old('platform', '') }}">
                            @if($errors->has('platform'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('platform') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.platform_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="availability" value="0">
                                <input type="checkbox" name="availability" id="availability" value="1" {{ old('availability', 0) == 1 ? 'checked' : '' }}>
                                <label for="availability">{{ trans('cruds.gampanion.fields.availability') }}</label>
                            </div>
                            @if($errors->has('availability'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('availability') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.availability_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="photo">{{ trans('cruds.gampanion.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="discount">{{ trans('cruds.gampanion.fields.discount') }}</label>
                            <input class="form-control" type="number" name="discount" id="discount" value="{{ old('discount', '0') }}" step="1">
                            @if($errors->has('discount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('discount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.gampanion.fields.discount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="other_game">{{ trans('cruds.gampanion.fields.other_game') }}</label>
                            <input class="form-control" type="text" name="other_game" id="other_game" value="{{ old('other_game', '') }}">
                            @if($errors->has('other_game'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('other_game') }}
                                </div>
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