@extends('layouts.full')

@section('content')

    <h1>{{__('Delete role')}}</h1>

    {!! Form::open(['route' => ['authz.admin_destroy_roles', $role->id], 'method' => 'DELETE', 'class'=> 'p-t-15']) !!}

    {{__('Are you sure to delete')}} {{__('the role')}} <b>{{$role->name}}</b> ?

    <hr>

    <a href="{{route('authz.admin_index_roles')}}" class="btn btn-primary btn-cons pull-left">{{__('Go back')}}</a>

    @can('permission::admin-destroy_roles')
        {!! Form::submit(__('Delete role'), ['class' => 'btn btn-danger btn-cons pull-right']) !!}
    @endcan

    {!! Form::close() !!}

@endsection