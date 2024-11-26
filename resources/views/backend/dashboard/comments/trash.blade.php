@extends('backend.layouts.dashboard')

@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Written Posts </h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
      For more information about DataTables, please visit the official DataTables documentation.</p>
    <div class="createProduct my-4">
      <a class="btn btn-primary" href={{route('posts.create')}}>{{__('Create New Post')}}</a>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            {{ __('Categories') }}</div>
          <div class="card-body">
            <div class="row">
              <a href="{{ route('categories.create') }}" class="btn btn-primary m-2">{{ __('Add category') }}</a>
            </div>
            <br>
            <table class="table table-responsive-sm table-striped">
              <thead>
                <tr>
                  <th>Author</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Date published</th>
                  <th>Status</th>
                  <th>category type</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                  <td><strong>{{ $category->user->fname }}</strong></td>
                  <td><strong>{{ $category->title }}</strong></td>
                  <td>{{ $category->short_description }}</td>
                  <td>{{ $category->posted_at }}</td>
                  <td>

                    @if($category->is_published == 0)
                    <span class="draft">
                      Draft
                    </span>
                    @else
                    <span class="draft">
                      Published
                    </span>
                    @endif

                  </td>
                  <td><strong>{{ $category->note_type }}</strong></td>
                  <td>
                    <a href="{{ url('/ad/' . $category->id) }}" class="btn btn-block btn-primary">View</a>
                  </td>
                  <td>
                    <a href="{{ url('/ad/' . $category->id . '/edit') }}" class="btn btn-block btn-primary">Edit</a>
                  </td>
                  <td>
                    <form action="{{ route('categories.destroy', $category->id ) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-block btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $categories->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('javascript')

@endsection