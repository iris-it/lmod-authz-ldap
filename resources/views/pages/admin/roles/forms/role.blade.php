<div>
    <div class="form-group form-group-default {{(!$errors->has('name') ?: 'has-error')}}">
        {!! Form::label('name', __('Name')) !!}
        <div class="controls">
            {!! Form::text('name', null, ['placeholder' => __('Name'), 'class' =>($errors->has('name') ? 'form-control error' : 'form-control')]) !!}
        </div>
    </div>
    @if ($errors->has('name'))
        <label id="name-error" class="error" for="name">
            {{ $errors->first('name') }}
        </label>
    @endif
</div>

<div>
    <div class="form-group form-group-default {{(!$errors->has('label') ?: 'has-error')}}">
        {!! Form::label('label', __('Label')) !!}
        <div class="controls">
            {!! Form::text('label', null, ['placeholder' => __('Label'), 'class' =>($errors->has('label') ? 'form-control error' : 'form-control')]) !!}
        </div>
    </div>
    @if ($errors->has('label'))
        <label id="label-error" class="error" for="label">
            {{ $errors->first('label') }}
        </label>
    @endif
</div>

<div>
    <div class="form-group form-group-default {{(!$errors->has('description') ?: 'has-error')}}">
        {!! Form::label('description', __('Description')) !!}
        <div class="controls">
            {!! Form::text('description', null, ['placeholder' => __('Description'), 'class' =>($errors->has('description') ? 'form-control error' : 'form-control')]) !!}
        </div>
    </div>
    @if ($errors->has('description'))
        <label id="description-error" class="error" for="description">
            {{ $errors->first('description') }}
        </label>
    @endif
</div>