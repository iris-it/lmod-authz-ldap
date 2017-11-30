@extends('layouts.full')

@section('content')

    <h1>{{__('Permissions')}}</h1>

    @can('permission::admin-create_permissions')
        <a href="{{route('authz.admin_create_permissions')}}">
            {{__('Create permission')}} <i class="fa fa-plus-circle"></i>
        </a>
    @endcan

    @can('permission::admin-trigger_scan_permissions')
        <a class="pull-right" href="{{route('authz.admin_trigger_scan_permissions')}}" onclick="event.preventDefault(); document.getElementById('scan-perm').submit();">
            {{__('Trigger permissions scan')}} <i class="fa fa-recycle"></i>
            <form id="scan-perm" action="{{ route('authz.admin_trigger_scan_permissions') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </a>
    @endcan

    <table class="table table-responsive">
        <thead>
        <tr>
            <th>{{__('Id')}}</th>
            <th>{{__('Name')}}</th>
            <th>{{__('Label')}}</th>
            <th>{{__('Description')}}</th>
            <th>{{__('Role')}}</th>
            <th>{{__('Updated')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->label}}</td>
                <td>{{$permission->description}}</td>
                <td>
                    @foreach($permission->roles as $role)
                        @include('authz::partials.roles_pills', ['role' => $role])
                    @endforeach
                </td>
                <td>{{$permission->updated_at->diffForHumans()}}</td>
                <td>
                    <div class="btn-group">
                        @can('permission::admin-edit_permissions')
                            <a href="{{route('authz.admin_edit_permissions', $permission->id)}}" class="btn btn-default">
                                {{__('Edit permission')}} <i class="fa fa-pencil"></i>
                            </a>
                        @endcan
                        @can('permission::admin-destroy_permissions')
                            <a href="{{route('authz.admin_delete_permissions', $permission->id)}}" class="btn btn-default">
                                {{__('Delete permission')}} <i class="fa fa-trash"></i>
                            </a>
                        @endcan
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="m-t-10">
        {!! $permissions->links('authz::partials.pagination') !!}
    </div>

@endsection