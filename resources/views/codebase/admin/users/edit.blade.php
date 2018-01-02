@extends('layouts.full')

@section('content')


    <div class="content">

        <div class="block">

            <div class="block-header block-header-default">
                <h3 class="block-title">
                    {{__('Edit user')}}
                </h3>
            </div>

            <div class="block-content">

                {!! Form::model($user, ['route' => ['authz.admin_update_users', $user->id], 'method' => 'PUT']) !!}

                @include('authz::admin.users.forms.user')

                <a href="{{route('authz.admin_index_users')}}" class="btn btn-primary">{{__('Go back')}}</a>

                @can('permission::admin-edit_users')
                    {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary']) !!}
                @endcan

                {!! Form::close() !!}

                <hr>

                {!! Form::model($user, ['route' => ['authz.admin_sync_users_roles', $user->id], 'method' => 'PUT']) !!}

                @include('authz::admin.users.forms.roles_sync')

                <a href="{{route('authz.admin_index_users')}}" class="btn btn-primary">{{__('Go back')}}</a>

                @can('permission::admin-edit_users')
                    {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary']) !!}
                @endcan

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@endsection