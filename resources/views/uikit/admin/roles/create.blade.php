@extends('layouts.full')

@section('content')

    <div class="uk-margin-top uk-margin-bottom">

        <div class="uk-container uk-container-small uk-position-relative">

            <div class="uk-h1">
                {{__('Create role')}}
            </div>

            {!! Form::open(['route' => 'authz.admin_store_roles', 'method' => 'POST', 'class'=> 'uk-form-stacked']) !!}

            @include('authz::admin.roles.forms.role')

            <a href="{{route('authz.admin_index_roles')}}" class="uk-button uk-button-primary">{{__('Go back')}}</a>

            @can('permission::admin-create_roles')
                {!! Form::submit(__('Submit'), ['class' => 'uk-button uk-button-primary uk-align-right']) !!}
            @endcan

            {!! Form::close() !!}

        </div>

    </div>

@endsection