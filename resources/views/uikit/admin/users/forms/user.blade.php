<div class="uk-margin">

    {!! Form::label('firstname', __('Firstname'), ['class' => 'uk-form-label']) !!}

    <div class="uk-form-controls">
        {!! Form::text('firstname', null, ['class' =>'uk-input', 'readonly']) !!}
    </div>

</div>

<div class="uk-margin">

    {!! Form::label('lastname', __('Lastname'), ['class' => 'uk-form-label']) !!}

    <div class="uk-form-controls">
        {!! Form::text('lastname', null, ['class' =>'uk-input', 'readonly']) !!}
    </div>

</div>

<div class="uk-margin">

    {!! Form::label('username', __('Username'), ['class' => 'uk-form-label']) !!}

    <div class="uk-form-controls">
        {!! Form::text('username', null, ['class' =>'uk-input', 'readonly']) !!}
    </div>

</div>

<div class="uk-margin">

    {!! Form::label('email', __('Email'), ['class' => 'uk-form-label']) !!}

    <div class="uk-form-controls">
        {!! Form::email('email', null, ['class' =>'uk-input', 'readonly']) !!}
    </div>

</div>

<div class="uk-margin">

    {!! Form::label('role', __('Role'), ['class' => 'uk-form-label']) !!}

    <div class="uk-form-controls">
        {!! Form::select('role_id', $roles, null,['class' => 'uk-input']) !!}
    </div>

    @if ($errors->has('role_id'))
        <div class="uk-text-danger">{{ $errors->first('role_id') }}</div>
    @endif

</div>
