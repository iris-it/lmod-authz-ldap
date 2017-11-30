@extends('layouts.auth')

@section('content')

    <h1>{{__('Login')}}</h1>

    {!! Form::open(['route' => 'authz.post_login', 'method' => 'POST', 'class'=> 'p-t-15']) !!}

    <div>
        <div class="form-group form-group-default {{(!$errors->has('username') ?: 'has-error')}}">
            {!! Form::label('username', __('Email')) !!}
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
        <div class="form-group form-group-default {{(!$errors->has('email') ?: 'has-error')}}">
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

    {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary btn-cons m-t-10', 'name' => 'submit-login']) !!}

    {!! Form::close() !!}

@endsection