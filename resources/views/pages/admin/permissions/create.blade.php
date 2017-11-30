@extends('layouts.full')

@section('content')

    <h1>{{__('Create permission')}}</h1>

    {!! Form::open(['route' => 'authz.admin_store_permissions', 'method' => 'POST', 'class'=> 'p-t-15']) !!}

    @include('authz::admin.permissions.forms.permission')

    <div class="row m-t-15">
        <div class="col-md-6">
            <a href="{{route('authz.admin_index_permissions')}}" class="btn btn-primary btn-cons pull-left">
                {{__('Go back')}}
            </a>
        </div>
        @can('permission::admin-create_permissions')
            <div class="col-md-6">
                {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary btn-cons pull-right']) !!}
            </div>
        @endcan
    </div>

    {!! Form::close() !!}

@endsection