<div>
    <div class="form-group form-group-default">
        {!! Form::label('firstname', __('Firstname')) !!}
        <div class="controls">
            {!! Form::text('firstname', null, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>
</div>

<div>
    <div class="form-group form-group-default">
        {!! Form::label('lastname', __('Lastname')) !!}
        <div class="controls">
            {!! Form::text('lastname', null, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>
</div>

<div>
    <div class="form-group form-group-default">
        {!! Form::label('username', __('Email')) !!}
        <div class="controls">
            {!! Form::text('username', null, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>
</div>

<div>
    <div class="form-group form-group-default">
        {!! Form::label('email', __('Email')) !!}
        <div class="controls">
            {!! Form::email('email', null, ['class' => 'form-control', 'readonly']) !!}
        </div>
    </div>
</div>

<div>
    <div class="form-group form-group-default {{(!$errors->has('role_id') ?: 'has-error')}}">
        {!! Form::label('role_id', __('Role')) !!}
        <div class="controls">
            {!! Form::select('role_id', $roles, null,['class' => 'full-width', 'data-init-plugin' => 'select2']) !!}
        </div>
    </div>
    @if ($errors->has('role_id'))
        <label id="role_id-error" class="error" for="role_id">
            {{ $errors->first('role_id') }}
        </label>
    @endif
</div>