@extends('backend.layouts.dashboard')

@section('content')

    <div class="container">
        <div class="animated fadeIn">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Edit Project </h1>

            <div class="createProduct my-4">
                <a class="btn btn-primary" href={{route('projects.create')}}>{{__('Create New Project')}}</a>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{route('projects.update', [$project->id])}}">
                @csrf
                @method('PUT')
                @include('backend.partials.forms.projects.create')
            </form>
        </div>
    </div>

@endsection

@section('scripts')
@endsection