@extends('layouts.full')

@section('content')

    <div class="content">

        <div class="block">

            <div class="block-header block-header-default">
                <h3 class="block-title">
                    {{__('Edit permission')}}
                </h3>
            </div>

            <div class="block-content">

                {!! Form::model($permission, ['route' => ['authz.admin_update_permissions', $permission->id], 'method' => 'PUT']) !!}

                @include('authz::admin.permissions.forms.permission')

                <a href="{{route('authz.admin_index_permissions')}}" class="btn btn-primary">{{__('Go back')}}</a>

                @can('permission::admin-edit_permissions')
                    {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary']) !!}
                @endcan

                {!! Form::close() !!}

                <hr>

                {!! Form::model($permission, ['route' => ['authz.admin_sync_permissions_roles', $permission->id], 'method' => 'PUT']) !!}

                @include('authz::admin.permissions.forms.roles_sync')

                <a href="{{route('authz.admin_index_permissions')}}" class="btn btn-primary">{{__('Go back')}}</a>

                @can('permission::admin-edit_permissions')
                    {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary']) !!}
                @endcan

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@endsection