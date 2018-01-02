@extends('layouts.full')

@section('content')

    <div class="content">

        <div class="block">

            <div class="block-header block-header-default">
                <h3 class="block-title">
                    {{__('Create permission')}}
                </h3>
            </div>

            <div class="block-content">

                {!! Form::open(['route' => 'authz.admin_store_permissions', 'method' => 'POST']) !!}

                @include('authz::admin.permissions.forms.permission')

                <a href="{{route('authz.admin_index_permissions')}}" class="btn btn-primary">{{__('Go back')}}</a>

                @can('permission::admin-create_permissions')
                    {!! Form::submit(__('Submit'), ['class' => 'btn btn-primary']) !!}
                @endcan

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@endsection