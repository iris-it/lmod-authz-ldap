@extends('layouts.full')

@section('content')

    <h1>{{__('Edit role')}}</h1>

    {!! Form::model($role, ['route' => ['authz.admin_update_roles', $role->id], 'method' => 'PUT', 'class'=> 'p-t-15']) !!}

    @include('authz::admin.roles.forms.role')

    <div class="row m-t-15">
        <div class="col-md-6">
            <a href="{{route('authz.admin_index_roles')}}" class="btn btn-primary btn-cons pull-left">
                {{__('Go back')}}
            </a>
        </div>
        @can('permission::admin-edit_roles')
            <div class="col-md-6">
                {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary btn-cons pull-right']) !!}
            </div>
        @endcan
    </div>

    {!! Form::close() !!}

    <hr>


    <h1>{{__('Edit role permissions')}}</h1>

    {!! Form::model($role, ['route' => ['authz.admin_sync_roles_permissions', $role->id], 'method' => 'PUT', 'class'=> 'p-t-15']) !!}

    @include('authz::admin.roles.forms.permissions_sync')

    <div class="row m-t-15">
        <div class="col-md-6">
            <a href="{{route('authz.admin_index_roles')}}" class="btn btn-primary btn-cons pull-left">
                {{__('Go back')}}
            </a>
        </div>
        @can('permission::admin-edit_roles')
            <div class="col-md-6">
                {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary btn-cons pull-right']) !!}
            </div>
        @endcan
    </div>

    {!! Form::close() !!}

@endsection