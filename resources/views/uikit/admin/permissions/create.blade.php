@extends('layouts.full')

@section('content')

    <div class="uk-margin-top uk-margin-bottom">

        <div class="uk-container uk-container-small uk-position-relative">

            <div class="uk-h1">
                {{__('Create permission')}}
            </div>

            {!! Form::open(['route' => 'authz.admin_store_permissions', 'method' => 'POST', 'class'=> 'uk-form-stacked']) !!}

            @include('authz::admin.permissions.forms.permission')

            <a href="{{route('authz.admin_index_permissions')}}" class="uk-button uk-button-primary">{{__('Go back')}}</a>

            @can('permission::admin-create_permissions')
                {!! Form::submit(__('Submit'), ['class' => 'uk-button uk-button-primary uk-align-right']) !!}
            @endcan

            {!! Form::close() !!}

        </div>

    </div>

@endsection