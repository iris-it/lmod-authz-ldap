@extends('layouts.full')

@section('content')

    <h1>{{__('Delete permission')}}</h1>

    {!! Form::open(['route' => ['authz.admin_destroy_permissions', $permission->id], 'method' => 'DELETE', 'class'=> 'uk-form-stacked']) !!}

    {{__('Are you sure to delete')}} {{__('the permission')}} <b>{{$permission->name}}</b> ?

    <hr>

    <a href="{{route('authz.admin_index_permissions')}}" class="btn btn-primary btn-cons pull-left">{{__('Go back')}}</a>

    @can('permission::admin-destroy_permissions')
        {!! Form::submit(__('Delete permission'), ['class' => 'btn btn-danger btn-cons pull-right']) !!}
    @endcan

    {!! Form::close() !!}

@endsection