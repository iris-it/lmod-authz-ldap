@extends('layouts.full')

@section('content')

    <div class="uk-margin-top uk-margin-bottom">

        <div class="uk-container uk-container-small uk-position-relative">

            <div class="uk-h1">
                {{__('Roles')}}

                @can('permission::admin-create_roles')
                    <a href="{{route('authz.admin_create_roles')}}" uk-icon="icon: plus-circle"></a>
                @endcan

                @can('permission::admin-trigger_roles_sync')
                    <a href="{{route('authz.admin_trigger_roles_sync')}}" title="Ldap sync" onclick="event.preventDefault(); document.getElementById('scan-perm').submit();">
                        <span uk-icon="icon: refresh"></span>
                        <form id="scan-perm" action="{{ route('authz.admin_trigger_roles_sync') }}" method="POST" style="display: none;">
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
                            @can('permission::admin-edit_roles')
                                <a href="{{route('authz.admin_edit_roles', $role->id)}}" uk-icon="icon: pencil"></a>
                            @endcan

                            @can('permission::admin-destroy_roles')
                                <a href="{{route('authz.admin_delete_roles', $role->id)}}" uk-icon="icon: trash"></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $roles->links('authz::partials.pagination')  !!}

        </div>

    </div>

@endsection