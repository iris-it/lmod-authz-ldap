@extends('layouts.auth')

@section('content')

    <h1 class="h3 font-w700 mt-30 mb-10">{{__('Login')}}</h1>

    {!! Form::open(['route' => 'authz.post_login', 'method' => 'POST']) !!}

    <div class="form-group row {{ ($errors->has('username')) ? 'is-invalid' : '' }}">
        <div class="col-12">
            <div class="form-material floating">
                {!! Form::text('username', null, ['class' => 'form-control']) !!}
                {!! Form::label('username', __('Username')) !!}
            </div>
            @if ($errors->has('username'))
                <div class="invalid-feedback">{{ $errors->first('username') }}</div>
            @endif
        </div>
    </div>

    <div class="form-group row {{ ($errors->has('password')) ? 'is-invalid' : '' }}">
        <div class="col-12">
            <div class="form-material floating">
                {!! Form::email('password', null, ['class' => 'form-control']) !!}
                {!! Form::label('password', __('Password')) !!}
            </div>
            @if ($errors->has('password'))
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <label class="custom-control custom-checkbox">
                {!! Form::checkbox('remember', 1, null, ['class' => 'custom-control-input']) !!}
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">{{ __('Remember me ?') }}</span>
            </label>
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit(__('Submit'), ['class' => 'btn btn-sm btn-hero btn-alt-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection
