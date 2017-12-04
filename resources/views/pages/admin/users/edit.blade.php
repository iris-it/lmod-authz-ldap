@extends('layouts.full')

@section('content')

    <h1>{{__('Edit user')}}</h1>

    {!! Form::model($user, ['route' => ['authz.admin_update_users', $user->id], 'method' => 'PUT', 'class'=> 'p-t-15']) !!}

    @include('authz::admin.users.forms.user')

    <div class="row m-t-15">
        <div class="col-md-6">
            <a href="{{route('authz.admin_index_users')}}" class="btn btn-primary btn-cons pull-left">
                {{__('Go back')}}
            </a>
        </div>
        @can('permission::admin-edit_users')
            <div class="col-md-6">
                {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary btn-cons pull-right']) !!}
            </div>
        @endcan
    </div>

    {!! Form::close() !!}

    <hr>

    <h1>{{__('Edit user roles')}}</h1>

    {!! Form::model($user, ['route' => ['authz.admin_sync_users_roles', $user->id], 'method' => 'PUT', 'class'=> 'p-t-15']) !!}

    @include('authz::admin.users.forms.roles_sync')

    <div class="row m-t-15">
        <div class="col-md-6">
            <a href="{{route('authz.admin_index_users')}}" class="btn btn-primary btn-cons pull-left">
                {{__('Go back')}}
            </a>
        </div>
        @can('permission::admin-edit_users')
            <div class="col-md-6">
                {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary btn-cons pull-right']) !!}
            </div>
        @endcan
    </div>

    {!! Form::close() !!}
@endsection