@extends('layouts.full')

@section('content')

    <div class="content">

        <div class="block">

            <div class="block-header block-header-default">
                <h3 class="block-title">
                    {{__('Delete role')}}
                </h3>
            </div>

            <div class="block-content">

                {!! Form::open(['route' => ['authz.admin_destroy_roles', $role->id], 'method' => 'DELETE']) !!}

                {{__('Are you sure to delete')}} {{__('the role')}} <b>{{$role->name}}</b>

                <hr>

                <a href="{{route('authz.admin_index_roles')}}" class="btn btn-primary">{{__('Go back')}}</a>

                @can('permission::admin-destroy_roles')
                    {!! Form::submit(__('Delete role'), ['class' => 'btn btn-primary']) !!}
                @endcan

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@endsection