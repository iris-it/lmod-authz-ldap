@extends('layouts.full')

@section('content')

    <div class="content">

        <div class="block">

            <div class="block-header block-header-default">
                <h3 class="block-title">{{__('Permissions')}}</h3>
                <div class="block-options">
                    @can('permission::admin-create_permissions')
                        <div class="block-options-item">
                            <a href="{{route('authz.admin_create_permissions')}}">
                                {{__('Add permission')}} <i class="fa fa-plus-circle"></i>
                            </a>
                        </div>
                    @endcan

                    @can('permission::admin-trigger_scan_permissions')
                        <div class="block-options-item">
                            <a href="{{route('authz.admin_trigger_scan_permissions')}}" onclick="event.preventDefault(); document.getElementById('scan-perm').submit();">
                                {{__('Trigger permissions scan')}} <i class="fa fa-recycle"></i>
                                <form id="scan-perm" action="{{ route('authz.admin_trigger_scan_permissions') }}" method="POST" style="display: none;">
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
                                        <a href="{{route('authz.admin_edit_permissions', $permission->id)}}" class="btn btn-primary">
                                            {{__('Edit permission')}} <i class="fa fa-pencil"></i>
                                        </a>
                                    @endcan
                                    @can('permission::admin-destroy_permissions')
                                        <a href="{{route('authz.admin_delete_permissions', $permission->id)}}" class="btn btn-warning">
                                            {{__('Delete permission')}} <i class="fa fa-trash"></i>
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $permissions->links('authz::partials.pagination')  !!}

            </div>

        </div>

    </div>

@endsection