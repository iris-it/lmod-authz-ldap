<div class="form-group row {{ ($errors->has('name')) ? 'is-invalid' : '' }}">
    <div class="col-12">
        <div class="form-material floating">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! Form::label('name', __('Name')) !!}
        </div>
        @if ($errors->has('name'))
            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        @endif
    </div>
</div>


<div class="form-group row {{ ($errors->has('label')) ? 'is-invalid' : '' }}">
    <div class="col-12">
        <div class="form-material floating">
            {!! Form::text('label', null, ['class' => 'form-control']) !!}
            {!! Form::label('label', __('Label')) !!}
        </div>
        @if ($errors->has('label'))
            <div class="invalid-feedback">{{ $errors->first('label') }}</div>
        @endif
    </div>
</div>

<div class="form-group row {{ ($errors->has('description')) ? 'is-invalid' : '' }}">
    <div class="col-12">
        <div class="form-material floating">
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
            {!! Form::label('description', __('Description')) !!}
        </div>
        @if ($errors->has('description'))
            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
        @endif
    </div>
</div>