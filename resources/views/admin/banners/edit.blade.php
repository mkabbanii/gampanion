@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.banner.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.banners.update", [$banner->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('banners') ? 'has-error' : '' }}">
                            <label for="banners">{{ trans('cruds.banner.fields.banners') }}</label>
                            <div class="needsclick dropzone" id="banners-dropzone">
                            </div>
                            @if($errors->has('banners'))
                                <span class="help-block" role="alert">{{ $errors->first('banners') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.banner.fields.banners_helper') }}</span>
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
    var uploadedBannersMap = {}
Dropzone.options.bannersDropzone = {
    url: '{{ route('admin.banners.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="banners[]" value="' + response.name + '">')
      uploadedBannersMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedBannersMap[file.name]
      }
      $('form').find('input[name="banners[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($banner) && $banner->banners)
      var files = {!! json_encode($banner->banners) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="banners[]" value="' + file.file_name + '">')
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