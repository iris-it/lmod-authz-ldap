@extends('layouts.auth')

@section('content')

    <h1>{{__('Login')}}</h1>

    {!! Form::open(['route' => 'authz.post_login', 'method' => 'POST', 'class'=> 'p-t-15']) !!}

    <div>
        <div class="form-group form-group-default {{(!$errors->has('username') ?: 'has-error')}}">
            {!! Form::label('username', __('Username')) !!}
            <div class="controls">
                {!! Form::text('username', null, ['placeholder' => __('Username'), 'class' =>($errors->has('username') ? 'form-control error' : 'form-control')]) !!}
            </div>
        </div>
        @if ($errors->has('username'))
            <label id="email-error" class="error" for="email">
                {{ $errors->first('username') }}
            </label>
        @endif
    </div>

    <div>
        <div class="form-group form-group-default {{(!$errors->has('password') ?: 'has-error')}}">
            {!! Form::label('password', __('Password')) !!}
            <div class="controls">
                {!! Form::password('password', ['placeholder' => __('Password'), 'class' =>($errors->has('password') ? 'form-control error' : 'form-control')]) !!}
            </div>
        </div>
        @if ($errors->has('password'))
            <label id="password-error" class="error" for="password">
                {{ $errors->first('password') }}
            </label>
        @endif
    </div>

    <div class="row">
        <div class="col-md-12 no-padding sm-p-l-10">
            <div class="checkbox">
                {!! Form::checkbox('remember', 1, null, ['id' => 'remember']) !!}
                <label for="remember">{{ __('Remember me ?') }}</label>
            </div>
        </div>
    </div>

    {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary btn-cons m-t-10', 'name' => 'submit-login']) !!}

    {!! Form::close() !!}

@endsection