<div class="form-group row {{ ($errors->has('permissions[]')) ? 'is-invalid' : '' }}">
    <div class="col-12">
        <div class="form-material floating">
            {!! Form::select('permissions[]', $permissions, array_pluck($role->permissions, 'id'), ['multiple', 'class'=> 'form-control'] ) !!}
            {!! Form::label('permissions[]', __('Permissions')) !!}
        </div>
        @if ($errors->has('permissions[]'))
            <div class="invalid-feedback">{{ $errors->first('permissions[]') }}</div>
        @endif
    </div>
</div>