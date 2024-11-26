@extends('backend.layouts.dashboard')

@section('content')

    <div class="container">
        <div class="animated fadeIn">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Create Project</h1>
            <div class="createProduct my-4">
                <a class="btn btn-primary" href={{route('projects.index')}}>{{__('View Projects')}}</a>
            </div>
            <form action="{{route('projects.store')}}" enctype="multipart/form-data" method="POST">
                @include('backend.partials.forms.projects.create')
            </form>
        </div>
    </div>
    @include('backend.partials.forms.categories.create-modal')
@endsection

@section('scripts')
@endsection