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
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
          <div class="card-header">
            {{ __('Posts') }}</div>
          <div class="card-body">
            <div class="row">
              <a href="{{ route('posts.create') }}" class="btn btn-primary m-2">{{ __('Add Post') }}</a>
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
                  <th>Post type</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                <tr>
                  <td><strong>{{ $post->user->fname }}</strong></td>
                  <td><strong>{{ $post->title }}</strong></td>
                  <td>{{ $post->short_description }}</td>
                  <td>{{ $post->posted_at }}</td>
                  <td>

                    @if($post->is_published == 0)
                    <span class="draft">
                      Draft
                    </span>
                    @else
                    <span class="draft">
                      Published
                    </span>
                    @endif

                  </td>
                  <td><strong>{{ $post->note_type }}</strong></td>
                  <td>
                    <a href="{{ url('/ad/base/posts/' . $post->id) }}" class="btn btn-block btn-primary">View</a>
                  </td>
                  <td>
                    <a href="{{ url('/ad/base/posts/' . $post->id . '/edit') }}"
                      class="btn btn-block btn-primary">Edit</a>
                  </td>
                  <td>
                    <form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-block btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $posts->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('javascript')

@endsection