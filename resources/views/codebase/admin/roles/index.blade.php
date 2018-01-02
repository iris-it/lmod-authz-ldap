@extends('layouts.full')

@section('content')

    <div class="content">

        <div class="block">

            <div class="block-header block-header-default">
                <h3 class="block-title">{{__('Roles')}}</h3>
                <div class="block-options">
                    @can('permission::admin-create_roles')
                        <div class="block-options-item">
                            <a href="{{route('authz.admin_create_roles')}}">
                                {{__('Add role')}} <i class="fa fa-plus-circle"></i>
                            </a>
                        </div>
                    @endcan
                    @can('permission::admin-trigger_roles_sync')
                        <div class="block-options-item">
                            <a href="{{route('authz.admin_trigger_roles_sync')}}" onclick="event.preventDefault(); document.getElementById('scan-perm').submit();">
                                {{__('Trigger roles sync')}} <i class="fa fa-recycle"></i>
                                <form id="scan-perm" action="{{ route('authz.admin_trigger_roles_sync') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>

            <div class="block-content">

                <table class="table table-hover table-vcenter">
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
                                        <a href="{{route('authz.admin_edit_roles', $role->id)}}" class="btn btn-primary">
                                            {{__('Edit role')}} <i class="fa fa-pencil"></i>
                                        </a>
                                    @endcan
                                    @can('permission::admin-destroy_roles')
                                        <a href="{{route('authz.admin_delete_roles', $role->id)}}" class="btn btn-warning">
                                            {{__('Delete role')}} <i class="fa fa-trash"></i>
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $roles->links('authz::partials.pagination')  !!}

            </div>

        </div>

    </div>

@endsection