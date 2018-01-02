@extends('layouts.full')

@section('content')

    <div class="content">

        <div class="block">

            <div class="block-header block-header-default">
                <h3 class="block-title">
                    {{__('Delete permission')}}
                </h3>
            </div>

            <div class="block-content">

                {!! Form::open(['route' => ['authz.admin_destroy_permissions', $permission->id], 'method' => 'DELETE']) !!}

                {{__('Are you sure to delete')}} {{__('the permission')}} <b>{{$permission->name}}</b> ?

                <hr>

                <a href="{{route('authz.admin_index_permissions')}}" class="btn btn-primary">{{__('Go back')}}</a>

                @can('permission::admin-destroy_permissions')
                    {!! Form::submit(__('Delete permission'), ['class' => 'btn btn-primary']) !!}
                @endcan

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@endsection