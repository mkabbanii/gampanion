@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.game.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.games.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="game_name">{{ trans('cruds.game.fields.game_name') }}</label>
                            <input class="form-control" type="text" name="game_name" id="game_name" value="{{ old('game_name', '') }}" required>
                            @if($errors->has('game_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('game_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.game.fields.game_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="game_info">{{ trans('cruds.game.fields.game_info') }}</label>
                            <input class="form-control" type="text" name="game_info" id="game_info" value="{{ old('game_info', '') }}" required>
                            @if($errors->has('game_info'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('game_info') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.game.fields.game_info_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="game_photo">{{ trans('cruds.game.fields.game_photo') }}</label>
                            <div class="needsclick dropzone" id="game_photo-dropzone">
                            </div>
                            @if($errors->has('game_photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('game_photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.game.fields.game_photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="note">{{ trans('cruds.game.fields.note') }}</label>
                            <input class="form-control" type="text" name="note" id="note" value="{{ old('note', '') }}">
                            @if($errors->has('note'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('note') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.game.fields.note_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="is_featured">{{ trans('cruds.game.fields.is_featured') }}</label>
                            <input class="form-control" type="number" name="is_featured" id="is_featured" value="{{ old('is_featured', '0') }}" step="1">
                            @if($errors->has('is_featured'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_featured') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.game.fields.is_featured_helper') }}</span>
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
    Dropzone.options.gamePhotoDropzone = {
    url: '{{ route('admin.games.storeMedia') }}',
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
      $('form').find('input[name="game_photo"]').remove()
      $('form').append('<input type="hidden" name="game_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="game_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($game) && $game->game_photo)
      var file = {!! json_encode($game->game_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="game_photo" value="' + file.file_name + '">')
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