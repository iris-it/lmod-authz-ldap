<div class="form-group row {{ ($errors->has('roles[]')) ? 'is-invalid' : '' }}">
    <div class="col-12">
        <div class="form-material floating">
            {!! Form::select('roles[]', $roles, array_pluck($permission->roles, 'id'), ['multiple', 'class'=> 'form-control'] ) !!}
            {!! Form::label('roles[]', __('Roles')) !!}
        </div>
        @if ($errors->has('roles[]'))
            <div class="invalid-feedback">{{ $errors->first('roles[]') }}</div>
        @endif
    </div>
</div>