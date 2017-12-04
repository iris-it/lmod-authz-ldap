<div>
    <div class="form-group form-group-default {{(!$errors->has('roles[]') ?: 'has-error')}}">
        {!! Form::label('roles[]', __('Roles')) !!}
        <div class="controls">
            {!! Form::select('roles[]', $roles, array_pluck($user->roles, 'id'), ['multiple', 'class' => 'full-width', 'data-init-plugin' => 'select2']) !!}
        </div>
    </div>
    @if ($errors->has('roles[]'))
        <label id="roles[]-error" class="error" for="roles[]">
            {{ $errors->first('roles[]') }}
        </label>
    @endif
</div>