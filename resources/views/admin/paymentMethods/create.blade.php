@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.paymentMethod.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.payment-methods.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('method') ? 'has-error' : '' }}">
                            <label for="method">{{ trans('cruds.paymentMethod.fields.method') }}</label>
                            <input class="form-control" type="text" name="method" id="method" value="{{ old('method', '') }}">
                            @if($errors->has('method'))
                                <span class="help-block" role="alert">{{ $errors->first('method') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paymentMethod.fields.method_helper') }}</span>
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