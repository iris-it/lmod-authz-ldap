@extends('layouts.full')

@section('content')

    <div class="uk-margin-top uk-margin-bottom">

        <div class="uk-container uk-container-small uk-position-relative">

            <div class="uk-h1">
                {{__('Edit permission')}}
            </div>

            {!! Form::model($permission, ['route' => ['authz.admin_update_permissions', $permission->id], 'method' => 'PUT', 'class'=> 'uk-form-stacked']) !!}

            @include('authz::admin.permissions.forms.permission')

            <a href="{{route('authz.admin_index_permissions')}}" class="uk-button uk-button-primary">{{__('Go back')}}</a>

            @can('permission::admin-edit_permissions')
                {!! Form::submit(__('Submit'), ['class' => 'uk-button uk-button-primary uk-align-right']) !!}
            @endcan

            {!! Form::close() !!}

            <hr>

            {!! Form::model($permission, ['route' => ['authz.admin_sync_permissions_roles', $permission->id], 'method' => 'PUT', 'class'=> 'uk-form-stacked']) !!}

            @include('authz::admin.permissions.forms.roles_sync')

            <a href="{{route('authz.admin_index_permissions')}}" class="uk-button uk-button-primary">{{__('Go back')}}</a>

            @can('permission::admin-edit_permissions')
                {!! Form::submit(__('Submit'), ['class' => 'uk-button uk-button-primary uk-align-right']) !!}
            @endcan

            {!! Form::close() !!}

        </div>

    </div>

@endsection