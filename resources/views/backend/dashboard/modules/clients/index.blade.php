@extends('backend.layouts.dashboard')

@section('content')

<div class="container">
  <div class="animated fadeIn">
    <!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Clients </h1>
    <div class="createProduct my-4">
    <a class="btn btn-primary" href={{route('clients.create')}}>{{__('Create New client')}}</a>
  </div>

    <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          {{ __('Clients') }}</div>
        <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Client name</th>
                <th>Content summary</th>
                <th>Logo</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($clients as $client)
              <tr class="odd">
                <td>{{ $client->client_name }}</td>
                <td>{{\Illuminate\Support\Str::limit(strip_tags($client->client_desc, 160)) }}</td>
                <td><img src="{{$client->getLastMediaUrl('logos')}}" width="40"
                                                                         alt="{{$client->client_name}}">
                </td>
                <td>
                  <span class="status">
                    {{($client->is_published == 0 ? 'Draft' : 'Published') ??  'Awaiting approval'}}
                  </span>
                </td>
                <td>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkclients" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false" aria-label="clients action button">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLinkclients">
                      <div class="dropdown-header">Actions:</div>
                      <a href="{{ route('clients.edit', $client->id) }}" class="btn dropdown-item">Edit</a>

                      @can('delete', $client)
                      <div class="dropdown-divider"></div>
                      <form action="{{ route('clients.destroy', $client->id ) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn dropdown-item text-danger">Delete</button>
                      </form>
                      @endcan

                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>client name</th>
                <th>Content</th>
                <th>Logo</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
{{--          {{ $clients->links() }}--}}
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection


@section('javascript')

@endsection