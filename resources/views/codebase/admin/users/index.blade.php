@extends('layouts.full')

@section('content')
    <div class="content">

        <div class="block">

            <div class="block-header block-header-default">
                <h3 class="block-title">{{__('Users')}}</h3>
                <div class="block-options">
                    @can('permission::admin-trigger_ldap_sync')
                        <div class="block-options-item">
                            <a href="{{route('authz.admin_trigger_ldap_sync')}}" onclick="event.preventDefault(); document.getElementById('scan-perm').submit();">
                                {{__('Trigger ldap sync')}} <i class="fa fa-recycle"></i>
                                <form id="scan-perm" action="{{ route('authz.admin_trigger_ldap_sync') }}" method="POST" style="display: none;">
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
                        <th>{{__('Firstname')}}</th>
                        <th>{{__('Lastname')}}</th>
                        <th>{{__('Username')}}</th>
                        <th>{{__('Email')}}</th>
                        <th>{{__('Role')}}</th>
                        <th>{{__('Updated')}}</th>
                        <th>{{__('Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    @include('authz::partials.roles_pills', ['role' => $role])
                                @endforeach
                            </td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                            <td>
                                <div class="btn-group">
                                    @can('permission::admin-edit_users')
                                        <a href="{{route('authz.admin_edit_users', $user->id)}}" class="btn btn-primary">
                                            {{__('Edit user')}} <i class="fa fa-pencil"></i>
                                        </a>
                                    @endcan
                                    @can('permission::admin-destroy_users')
                                        <a href="{{route('authz.admin_delete_users', $user->id)}}" class="btn btn-warning">
                                            {{__('Delete user')}} <i class="fa fa-trash"></i>
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $users->links('authz::partials.pagination')  !!}

            </div>
        </div>
    </div>

@endsection