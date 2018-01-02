@extends('layouts.full')

@section('content')

    <div class="content">

        <div class="block">

            <div class="block-header block-header-default">
                <h3 class="block-title">
                    {{__('Create role')}}
                </h3>
            </div>

            <div class="block-content">

                {!! Form::open(['route' => 'authz.admin_store_roles', 'method' => 'POST']) !!}

                @include('authz::admin.roles.forms.role')

                <a href="{{route('authz.admin_index_roles')}}" class="btn btn-primary">{{__('Go back')}}</a>

                @can('permission::admin-create_roles')
                    {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary']) !!}
                @endcan

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@endsection