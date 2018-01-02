@extends('layouts.full')

@section('content')

    <div class="content">

        <div class="block">

            <div class="block-header block-header-default">
                <h3 class="block-title">
                    {{__('Delete user')}}
                </h3>
            </div>

            <div class="block-content">

                {!! Form::model($user, ['route' => ['authz.admin_destroy_users', $user->id], 'method' => 'DELETE']) !!}

                {{__('Are you sure to delete')}} <b>{{$user->firstname}} {{$user->lastname}} ( {{$user->username}} )</b> ?

                <hr>

                <a href="{{route('authz.admin_index_users')}}" class="btn btn-primary">{{__('Go back')}}</a>

                @can('permission::admin-destroy_users')
                    {!! Form::submit(__('Delete user'), ['class' => 'btn btn-primary']) !!}
                @endcan

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@endsection