@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.withdraw.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.withdraws.update", [$withdraw->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.withdraw.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $withdraw->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="points">{{ trans('cruds.withdraw.fields.points') }}</label>
                            <input class="form-control" type="number" name="points" id="points" value="{{ old('points', $withdraw->points) }}" step="1" required>
                            @if($errors->has('points'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('points') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.points_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cash_amount">{{ trans('cruds.withdraw.fields.cash_amount') }}</label>
                            <input class="form-control" type="number" name="cash_amount" id="cash_amount" value="{{ old('cash_amount', $withdraw->cash_amount) }}" step="1">
                            @if($errors->has('cash_amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cash_amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.cash_amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="payment_method_id">{{ trans('cruds.withdraw.fields.payment_method') }}</label>
                            <select class="form-control select2" name="payment_method_id" id="payment_method_id" required>
                                @foreach($payment_methods as $id => $payment_method)
                                    <option value="{{ $id }}" {{ (old('payment_method_id') ? old('payment_method_id') : $withdraw->payment_method->id ?? '') == $id ? 'selected' : '' }}>{{ $payment_method }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment_method'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_method') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.payment_method_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_copy">{{ trans('cruds.withdraw.fields.payment_copy') }}</label>
                            <div class="needsclick dropzone" id="payment_copy-dropzone">
                            </div>
                            @if($errors->has('payment_copy'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_copy') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.payment_copy_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="note">{{ trans('cruds.withdraw.fields.note') }}</label>
                            <input class="form-control" type="text" name="note" id="note" value="{{ old('note', $withdraw->note) }}">
                            @if($errors->has('note'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('note') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.withdraw.fields.note_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="status_id">{{ trans('cruds.withdraw.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id" required>
                                @foreach($statuses as $id => $status)
                                    <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $withdraw->status->id ?? '') == $id ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
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