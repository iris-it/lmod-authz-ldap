@extends('layouts.full')

@section('content')

    <div class="uk-margin-top uk-margin-bottom">

        <div class="uk-container uk-container-small uk-position-relative">

            <div class="uk-h1">
                {{__('Edit role')}}
            </div>

            {!! Form::model($role, ['route' => ['authz.admin_update_roles', $role->id], 'method' => 'PUT', 'class'=> 'uk-form-stacked']) !!}

            @include('authz::admin.roles.forms.role')

            <a href="{{route('authz.admin_index_roles')}}" class="uk-button uk-button-primary">{{__('Go back')}}</a>

            @can('permission::admin-edit_roles')
                {!! Form::submit(__('Submit'), ['class' => 'uk-button uk-button-primary uk-align-right']) !!}
            @endcan

            {!! Form::close() !!}

            <hr>

            {!! Form::model($role, ['route' => ['authz.admin_sync_roles_permissions', $role->id], 'method' => 'PUT', 'class'=> 'uk-form-stacked']) !!}

            @include('authz::admin.roles.forms.permissions_sync')

            <a href="{{route('authz.admin_index_roles')}}" class="uk-button uk-button-primary">{{__('Go back')}}</a>

            @can('permission::admin-edit_roles')
                {!! Form::submit(__('Submit'), ['class' => 'uk-button uk-button-primary uk-align-right']) !!}
            @endcan

            {!! Form::close() !!}

        </div>

    </div>

@endsection