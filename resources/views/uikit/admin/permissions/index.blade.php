@extends('layouts.full')

@section('content')

    <div class="uk-margin-top uk-margin-bottom">

        <div class="uk-container uk-container-small uk-position-relative">

            <div class="uk-h1">
                {{__('Permissions')}}

                @can('permission::admin-create_permissions')
                    <a href="{{route('authz.admin_create_permissions')}}">
                        <span uk-icon="icon: plus-circle"></span>
                    </a>
                @endcan

                @can('permission::admin-trigger_scan_permissions')
                    <a href="{{route('authz.admin_trigger_scan_permissions')}}" title="Scan permissions" onclick="event.preventDefault(); document.getElementById('scan-perm').submit();">
                        <span uk-icon="icon: refresh"></span>
                        <form id="scan-perm" action="{{ route('authz.admin_trigger_scan_permissions') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>
                @endcan

            </div>

            <table class="uk-table uk-table-striped">
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
                            @can('permission::admin-edit_permissions')
                                <a href="{{route('authz.admin_edit_permissions', $permission->id)}}" uk-icon="icon: pencil"></a>
                            @endcan

                            @can('permission::admin-destroy_permissions')
                                <a href="{{route('authz.admin_delete_permissions', $permission->id)}}" uk-icon="icon: trash"></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $permissions->links('authz::partials.pagination')  !!}

        </div>

    </div>

@endsection