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