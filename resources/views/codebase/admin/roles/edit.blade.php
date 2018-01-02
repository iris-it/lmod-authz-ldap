@extends('layouts.full')

@section('content')

    <div class="content">

        <div class="block">

            <div class="block-header block-header-default">
                <h3 class="block-title">
                    {{__('Edit role')}}
                </h3>
            </div>

            <div class="block-content">

                {!! Form::model($role, ['route' => ['authz.admin_update_roles', $role->id], 'method' => 'PUT']) !!}

                @include('authz::admin.roles.forms.role')

                <a href="{{route('authz.admin_index_roles')}}" class="btn btn-primary">{{__('Go back')}}</a>

                @can('permission::admin-edit_roles')
                    {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary']) !!}
                @endcan

                {!! Form::close() !!}

                <hr>

                {!! Form::model($role, ['route' => ['authz.admin_sync_roles_permissions', $role->id], 'method' => 'PUT']) !!}

                @include('authz::admin.roles.forms.permissions_sync')

                <a href="{{route('authz.admin_index_roles')}}" class="btn btn-primary">{{__('Go back')}}</a>

                @can('permission::admin-edit_roles')
                    {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary']) !!}
                @endcan

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@endsection