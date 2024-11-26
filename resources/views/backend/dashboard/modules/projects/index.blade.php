@extends('backend.layouts.dashboard')

@section('content')

<div class="container">
  <div class="animated fadeIn">

    <h1 class="h3 mb-2 text-gray-800">Projects</h1>
    <div class="createProduct my-4">
      <a class="btn btn-primary" href={{route('projects.create')}}>{{__('Create New Project')}}</a>
    </div>

  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          {{ __('Projects') }}</div>
        <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered" style="width: 100%;">
            <thead>
              <tr>
                <th>Project number</th>
                <th>Project name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Author</th>
                <th>Slug</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse($projects as $project)
              <tr class="odd">
                <td>{{ $project->project_number }}</td>
                <td>{{$project->project_name, 160}}</td>
                <td>{{ $project->posted_at }}</td>
                <td>
                  {{$project->is_published == 0 ? 'Draft' : ( $project->is_published == 1 ? 'Published' : 'Awaiting approval' )}}
                </td>
                <td>{{ $project->getRelatedUser()->name }}</td>
                <td>{{ $project->slug }}</td>
                <td>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkProjects" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false" aria-label="Projects action button">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLinkProjects">
                      <div class="dropdown-header">Actions:</div>
                         @cannot('isManager')
                      @can('edit', $project)
                      <a href="{{ url('/ad/projects/' . $project->id . '/edit') }}" class="btn dropdown-item">Edit</a>
                      @endcan

                      @can('delete', $project)
                      <div class="dropdown-divider"></div>
                      <form action="{{ route('projects.destroy', $project->id ) }}" method="POST">
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
                <p>No projects to display</p>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Project Description</th>
                <th>Date</th>
                <th>Status</th>
                <th>Slug</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
          {{ $projects->links() }}
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