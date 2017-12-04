@extends('layouts.full')

@section('content')

    <div class="uk-margin-top uk-margin-bottom">

        <div class="uk-container uk-container-small uk-position-relative">

            <div class="uk-h1">
                {{__('Edit user')}}
            </div>

            {!! Form::model($user, ['route' => ['authz.admin_update_users', $user->id], 'method' => 'PUT', 'class'=> 'uk-form-stacked']) !!}

            @include('authz::admin.users.forms.user')

            <a href="{{route('authz.admin_index_users')}}" class="uk-button uk-button-primary">{{__('Go back')}}</a>

            @can('permission::admin-edit_users')
                {!! Form::submit(__('Submit'), ['class' => 'uk-button uk-button-primary uk-align-right']) !!}
            @endcan

            {!! Form::close() !!}

            <hr>

            <div class="uk-h1">
                {{__('Edit user roles')}}
            </div>

            {!! Form::model($user, ['route' => ['authz.admin_sync_users_roles', $user->id], 'method' => 'PUT', 'class'=> 'uk-form-stacked']) !!}

            @include('authz::admin.users.forms.roles_sync')

            <a href="{{route('authz.admin_index_users')}}" class="uk-button uk-button-primary">{{__('Go back')}}</a>

            @can('permission::admin-edit_users')
                {!! Form::submit(__('Submit'), ['class' => 'uk-button uk-button-primary uk-align-right']) !!}
            @endcan

            {!! Form::close() !!}

        </div>

    </div>

@endsection