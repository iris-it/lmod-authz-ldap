@extends('layouts.full')

@section('content')

    <div class="uk-margin-top uk-margin-bottom">

        <div class="uk-container uk-container-small uk-position-relative">

            <div class="uk-h1">
                {{__('Delete user')}}
            </div>

            {!! Form::model($user, ['route' => ['authz.admin_destroy_users', $user->id], 'method' => 'DELETE', 'class'=> 'uk-form-stacked']) !!}

            {{__('Are you sure to delete')}} {{$user->firstname}} {{$user->lastname}} ( {{$user->username}} )

            <hr>

            <a href="{{route('authz.admin_index_users')}}" class="uk-button uk-button-primary">{{__('Go back')}}</a>

            @can('permission::admin-destroy_users')
                {!! Form::submit(__('Delete user'), ['class' => 'uk-button uk-button-primary uk-align-right']) !!}
            @endcan

            {!! Form::close() !!}

        </div>

    </div>

@endsection