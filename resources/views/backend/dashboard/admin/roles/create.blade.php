@extends('backend.layouts.dashboard')

@section('content')

<div class="container">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Written Posts </h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the official DataTables documentation.</p>
        <div class="createProduct my-4">
            <a class="btn btn-primary" href={{route('posts.create')}}>{{__('Create New Post')}}</a>
        </div>

        @include('partials.alert')

        <form method="POST" action="{{route('roles.store')}}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="role_name">Role name</label>
                <input type="text" name="role_name" class="form-control" id="J_name" placeholder="Role name..."
                    value="{{ old('role_name') }}" required>
            </div>
            <div class="form-group">
                <label for="role_slug">Role Slug</label>
                <input type="text" name="role_slug" tag="role_slug" class="form-control" id="J_slug"
                    placeholder="Role Slug..." value="{{ old('role_slug') }}" required>
            </div>
            <div class="form-group">
                <label for="roles_permissions">Add Permissions</label>
                <input type="text" data-role="tagsinput" name="roles_permissions" class="form-control"
                    id="roles_permissions" value="{{ old('roles_permissions') }}">
            </div>

            <div class="form-group pt-2">
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>

@endsection

@section('javascript')


@endsection