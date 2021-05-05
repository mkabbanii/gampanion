@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.withdraw.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.withdraws.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.withdraw.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('points') ? 'has-error' : '' }}">
                            <label class="required" for="points">{{ trans('cruds.withdraw.fields.points') }}</label>
                            <input class="form-control" type="number" name="points" id="points" value="{{ old('points', '') }}" step="1" required>
                            @if($errors->has('points'))
                                <span class="help-block" role="alert">{{ $errors->first('points') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.points_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cash_amount') ? 'has-error' : '' }}">
                            <label for="cash_amount">{{ trans('cruds.withdraw.fields.cash_amount') }}</label>
                            <input class="form-control" type="number" name="cash_amount" id="cash_amount" value="{{ old('cash_amount', '0') }}" step="1">
                            @if($errors->has('cash_amount'))
                                <span class="help-block" role="alert">{{ $errors->first('cash_amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.cash_amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('payment_method') ? 'has-error' : '' }}">
                            <label class="required" for="payment_method_id">{{ trans('cruds.withdraw.fields.payment_method') }}</label>
                            <select class="form-control select2" name="payment_method_id" id="payment_method_id" required>
                                @foreach($payment_methods as $id => $payment_method)
                                    <option value="{{ $id }}" {{ old('payment_method_id') == $id ? 'selected' : '' }}>{{ $payment_method }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment_method'))
                                <span class="help-block" role="alert">{{ $errors->first('payment_method') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.payment_method_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('payment_copy') ? 'has-error' : '' }}">
                            <label for="payment_copy">{{ trans('cruds.withdraw.fields.payment_copy') }}</label>
                            <div class="needsclick dropzone" id="payment_copy-dropzone">
                            </div>
                            @if($errors->has('payment_copy'))
                                <span class="help-block" role="alert">{{ $errors->first('payment_copy') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.payment_copy_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                            <label for="note">{{ trans('cruds.withdraw.fields.note') }}</label>
                            <input class="form-control" type="text" name="note" id="note" value="{{ old('note', '') }}">
                            @if($errors->has('note'))
                                <span class="help-block" role="alert">{{ $errors->first('note') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.note_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label class="required" for="status_id">{{ trans('cruds.withdraw.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id" required>
                                @foreach($statuses as $id => $status)
                                    <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.status_helper') }}</span>
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
    Dropzone.options.paymentCopyDropzone = {
    url: '{{ route('admin.withdraws.storeMedia') }}',
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
      $('form').find('input[name="payment_copy"]').remove()
      $('form').append('<input type="hidden" name="payment_copy" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="payment_copy"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($withdraw) && $withdraw->payment_copy)
      var file = {!! json_encode($withdraw->payment_copy) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="payment_copy" value="' + file.file_name + '">')
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