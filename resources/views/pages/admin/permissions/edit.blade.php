@extends('layouts.full')

@section('content')

    <h1>{{__('Edit permission')}}</h1>

    {!! Form::model($permission, ['route' => ['authz.admin_update_permissions', $permission->id], 'method' => 'PUT', 'class'=> 'p-t-15']) !!}

    @include('authz::admin.permissions.forms.permission')

    <div class="row m-t-15">
        <div class="col-md-6">
            <a href="{{route('authz.admin_index_permissions')}}" class="btn btn-primary btn-cons pull-left">
                {{__('Go back')}}
            </a>
        </div>
        @can('permission::admin-edit_permissions')
            <div class="col-md-6">
                {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary btn-cons pull-right']) !!}
            </div>
        @endcan
    </div>

    {!! Form::close() !!}

    <hr>

    <h1>{{__('Edit permission role')}}</h1>

    {!! Form::model($permission, ['route' => ['authz.admin_sync_permissions_roles', $permission->id], 'method' => 'PUT', 'class'=> 'p-t-15']) !!}

    @include('authz::admin.permissions.forms.roles_sync')

    <div class="row m-t-15">
        <div class="col-md-6">
            <a href="{{route('authz.admin_index_permissions')}}" class="btn btn-primary btn-cons pull-left">
                {{__('Go back')}}
            </a>
        </div>
        @can('permission::admin-edit_permissions')
            <div class="col-md-6">
                {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary btn-cons pull-right']) !!}
            </div>
        @endcan
    </div>

    {!! Form::close() !!}

@endsection