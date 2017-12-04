@extends('layouts.auth')

@section('content')

    <div class="uk-margin-top uk-margin-bottom">

        <div class="uk-container uk-container-small uk-position-relative">

            <div class="uk-h1">
                {{__('Login')}}
            </div>

            {!! Form::open(['route' => 'authz.post_login', 'method' => 'POST', 'class'=> 'uk-form-stacked']) !!}

            <div class="uk-margin">

                {!! Form::label('username', __('Username'), ['class' => 'uk-form-label']) !!}

                <div class="uk-form-controls">
                    {!! Form::text('username', null, ['class' =>($errors->has('username') ? 'uk-input uk-form-danger' : 'uk-input')]) !!}
                </div>

                @if ($errors->has('username'))
                    <div class="uk-text-danger">{{ $errors->first('username') }}</div>
                @endif

            </div>


            <div class="uk-margin">

                {!! Form::label('password', __('Password'), ['class' => 'uk-form-label']) !!}

                <div class="uk-form-controls">
                    {!! Form::password('password', ['class' =>($errors->has('password') ? 'uk-input uk-form-danger' : 'uk-input')]) !!}
                </div>

                @if ($errors->has('password'))
                    <div class="uk-text-danger">{{ $errors->first('password') }}</div>
                @endif

            </div>

            <div class="uk-margin">
                <label>
                    {!! Form::checkbox('remember', 1, null, ['class' => 'uk-checkbox']) !!}
                    {{ __('Remember me ?') }}
                </label>
            </div>

            {!! Form::submit(__('Submit'), ['class' => 'uk-button uk-button-primary', 'name' => 'submit-login']) !!}

            {!! Form::close() !!}

        </div>

    </div>
@endsection
