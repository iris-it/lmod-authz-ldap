@extends('layouts.full')

@section('content')

    <h1>{{__('Users')}}</h1>

    @can('permission::admin-trigger_ldap_sync')
        <a class="pull-right" href="{{route('authz.admin_trigger_ldap_sync')}}" onclick="event.preventDefault(); document.getElementById('scan-perm').submit();">
            {{__('Trigger ldap sync')}} <i class="fa fa-recycle"></i>
            <form id="scan-perm" action="{{ route('authz.admin_trigger_ldap_sync') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </a>
    @endcan

    <table class="table table-responsive">
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
                    @include('authz::partials.roles_pills', ['role' => $user->role])
                </td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>
                    <div class="btn-group">
                        @can('permission::admin-edit_users')
                            <a href="{{route('authz.admin_edit_users', $user->id)}}" class="btn btn-default">
                                {{__('Edit user')}} <i class="fa fa-pencil"></i>
                            </a>
                        @endcan
                        @can('permission::admin-destroy_users')
                            <a href="{{route('authz.admin_delete_users', $user->id)}}" class="btn btn-default">
                                {{__('Delete user')}} <i class="fa fa-trash"></i>
                            </a>
                        @endcan
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="m-t-10">
        {!! $users->links('authz::partials.pagination') !!}
    </div>

@endsection