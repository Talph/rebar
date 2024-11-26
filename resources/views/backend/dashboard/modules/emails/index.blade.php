@extends('backend.layouts.dashboard')

@section('content')

<div class="container">
  <div class="animated fadeIn">
    <!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Emails </h1>

    <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          {{ __('Emails') }}</div>
        <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($emails as $email)
              <tr class="odd">
                <td>{{ $email->first__name .' '. $email->last__name }}</td>
                <td>
                  {{$email->__email}}
                </td>
                <td>{{\Illuminate\Support\Str::limit(strip_tags($email->__message, 160)) }}</td>

                <td>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkemails" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false" aria-label="emails action button">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLinkemails">
                      <div class="dropdown-header">Actions:</div>
                      <a href="{{ route('emails.show', $email->id) }}" class="btn dropdown-item">View</a>

                      @can('delete', $email)
                      <div class="dropdown-divider"></div>
                      <form action="{{ route('emails.destroy', $email->id ) }}" method="POST">
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
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
          {{ $emails->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection


@section('javascript')

@endsection