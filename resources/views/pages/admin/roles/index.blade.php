@extends('layouts.full')

@section('content')

    <h1>{{__('Roles')}}</h1>

    @can('permission::admin-create_roles')
        <a href="{{route('authz.admin_create_roles')}}">
            {{__('Create role')}} <i class="fa fa-plus-circle"></i>
        </a>
    @endcan

    @can('permission::admin-trigger_roles_sync')
        <a class="pull-right" href="{{route('authz.admin_trigger_roles_sync')}}" onclick="event.preventDefault(); document.getElementById('scan-perm').submit();">
            {{__('Trigger roles sync')}} <i class="fa fa-recycle"></i>
            <form id="scan-perm" action="{{ route('authz.admin_trigger_roles_sync') }}" method="POST" style="display: none;">
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
            <th>{{__('User count')}}</th>
            <th>{{__('Permission count')}}</th>
            <th>{{__('Updated')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->label}}</td>
                <td>{{$role->description}}</td>
                <td>{{$role->users->count()}}</td>
                <td>{{$role->permissions->count()}}</td>
                <td>{{$role->updated_at->diffForHumans()}}</td>
                <td>
                    <div class="btn-group">
                        @can('permission::admin-edit_roles')
                            <a href="{{route('authz.admin_edit_roles', $role->id)}}" class="btn btn-default">
                                {{__('Edit role')}} <i class="fa fa-pencil"></i>
                            </a>
                        @endcan
                        @can('permission::admin-destroy_roles')
                            <a href="{{route('authz.admin_delete_roles', $role->id)}}" class="btn btn-default">
                                {{__('Delete role')}} <i class="fa fa-trash"></i>
                            </a>
                        @endcan
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="m-t-10">
        {!! $roles->links('authz::partials.pagination') !!}
    </div>

@endsection