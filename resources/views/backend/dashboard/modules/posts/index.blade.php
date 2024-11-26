@extends('backend.layouts.dashboard')

@section('content')

<div class="container">
  <div class="animated fadeIn">


      <h1 class="h3 mb-2 text-gray-800">Blog posts</h1>

      @if(Auth::user()->hasRelatedRole('user'))
      You can read through the posts below
      @else
      <div class="createProduct border-2 my-4">
        <a class="btn btn-primary" href={{route('posts.create')}}>{{__('Create New Post')}}</a>
      </div>
      @endif

  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          {{ __('Blog posts') }}</div>
        <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered" style="width: 100%;">
            <thead>
              <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Content excert</th>
                <th>Date</th>
                <th>Status</th>
                <th>Slug</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse($posts as $post)
              <tr class="odd">
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->fname }} {{ $post->user->lname }}</td>
                <td>{{ \Illuminate\Support\Str::limit($post->short_description, 160) }}</td>
                <td>{{ $post->posted_at }}</td>
                <td>

                  @if($post->is_published == 0)
                  <span class="draft">
                    Draft
                  </span>
                  @elseif($post->is_published == 1)
                  <span class="draft">
                    Published
                  </span>
                  @else
                  <span class="draft">
                    Awaiting approval
                  </span>
                  @endif

                </td>
                <td>{{ $post->slug }}</td>
                <td>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkPosts" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false" aria-label="Posts action button">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLinkPosts">
                      <div class="dropdown-header">Actions:</div>
                      <a href="{{ url('/ad/posts/' . $post->id) }}" class="btn dropdown-item">View</a>

                      @cannot('isManager')
                      @can('edit', $post)
                      <a href="{{ url('/ad/posts/' . $post->id . '/edit') }}" class="btn dropdown-item">Edit</a>
                      @endcan

                      @can('delete', $post)
                      <div class="dropdown-divider"></div>
                      <form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn dropdown-item text-danger">Delete</button>
                      </form>
                      @endcan
                      @endcannot
                    </div>
                  </div>
                </td>
              </tr>
                @empty
                <p>No posts currently.</p>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Content</th>
                <th>Date</th>
                <th>Status</th>
                <th>Slug</th>
                <th></th>
              </tr>
            </tfoot>
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
  @include('backend.partials.dataTables-scripts')
@endsection