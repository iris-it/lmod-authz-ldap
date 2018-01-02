<div class="form-group row {{ ($errors->has('firstname')) ? 'is-invalid' : '' }}">
    <div class="col-12">
        <div class="form-material floating">
            {!! Form::text('firstname', null, ['class' => 'form-control', 'readonly']) !!}
            {!! Form::label('firstname', __('Firstname')) !!}
        </div>
        @if ($errors->has('firstname'))
            <div class="invalid-feedback">{{ $errors->first('firstname') }}</div>
        @endif
    </div>
</div>

<div class="form-group row {{ ($errors->has('lastname')) ? 'is-invalid' : '' }}">
    <div class="col-12">
        <div class="form-material floating">
            {!! Form::text('lastname', null, ['class' => 'form-control', 'readonly']) !!}
            {!! Form::label('lastname', __('Lastname')) !!}
        </div>
        @if ($errors->has('lastname'))
            <div class="invalid-feedback">{{ $errors->first('lastname') }}</div>
        @endif
    </div>
</div>

<div class="form-group row {{ ($errors->has('username')) ? 'is-invalid' : '' }}">
    <div class="col-12">
        <div class="form-material floating">
            {!! Form::text('username', null, ['class' => 'form-control', 'readonly']) !!}
            {!! Form::label('username', __('Username')) !!}
        </div>
        @if ($errors->has('username'))
            <div class="invalid-feedback">{{ $errors->first('username') }}</div>
        @endif
    </div>
</div>

<div class="form-group row {{ ($errors->has('email')) ? 'is-invalid' : '' }}">
    <div class="col-12">
        <div class="form-material floating">
            {!! Form::email('email', null, ['class' => 'form-control', 'readonly']) !!}
            {!! Form::label('email', __('Email')) !!}
        </div>
        @if ($errors->has('email'))
            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        @endif
    </div>
</div>


