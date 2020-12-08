@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.game.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.games.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('game_name') ? 'has-error' : '' }}">
                            <label class="required" for="game_name">{{ trans('cruds.game.fields.game_name') }}</label>
                            <input class="form-control" type="text" name="game_name" id="game_name" value="{{ old('game_name', '') }}" required>
                            @if($errors->has('game_name'))
                                <span class="help-block" role="alert">{{ $errors->first('game_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.game.fields.game_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('game_info') ? 'has-error' : '' }}">
                            <label class="required" for="game_info">{{ trans('cruds.game.fields.game_info') }}</label>
                            <input class="form-control" type="text" name="game_info" id="game_info" value="{{ old('game_info', '') }}" required>
                            @if($errors->has('game_info'))
                                <span class="help-block" role="alert">{{ $errors->first('game_info') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.game.fields.game_info_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('game_photo') ? 'has-error' : '' }}">
                            <label for="game_photo">{{ trans('cruds.game.fields.game_photo') }}</label>
                            <div class="needsclick dropzone" id="game_photo-dropzone">
                            </div>
                            @if($errors->has('game_photo'))
                                <span class="help-block" role="alert">{{ $errors->first('game_photo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.game.fields.game_photo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                            <label for="note">{{ trans('cruds.game.fields.note') }}</label>
                            <input class="form-control" type="text" name="note" id="note" value="{{ old('note', '') }}">
                            @if($errors->has('note'))
                                <span class="help-block" role="alert">{{ $errors->first('note') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.game.fields.note_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_featured') ? 'has-error' : '' }}">
                            <label for="is_featured">{{ trans('cruds.game.fields.is_featured') }}</label>
                            <input class="form-control" type="number" name="is_featured" id="is_featured" value="{{ old('is_featured', '0') }}" step="1">
                            @if($errors->has('is_featured'))
                                <span class="help-block" role="alert">{{ $errors->first('is_featured') }}</span>
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