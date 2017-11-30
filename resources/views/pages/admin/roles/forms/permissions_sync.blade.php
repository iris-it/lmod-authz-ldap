<div>
    <div class="form-group form-group-default {{(!$errors->has('permissions[]') ?: 'has-error')}}">
        {!! Form::label('permissions[]', __('Permissions')) !!}
        <div class="controls">
            {!! Form::select('permissions[]', $permissions, array_pluck($role->permissions, 'id'), ['multiple', 'class' => 'full-width', 'data-init-plugin' => 'select2']) !!}
        </div>
    </div>
    @if ($errors->has('permissions[]'))
        <label id="permissions[]-error" class="error" for="permissions[]">
            {{ $errors->first('permissions[]') }}
        </label>
    @endif
</div>