@extends('backend.layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container">
    <div class="row rounded shadow bg-gradient-white p-4 my-4">
        <div class="col-md-6">
          <h1 class="h3 mb-2 text-gray-800">Emails</h1>
          @if(Auth::user()->hasRole('user'))
          You can read through the emails below
          @else
          <div class="createProduct border-2 my-4">
            <a class="btn btn-primary" href={{route('emails.create')}}>{{__('Create New email')}}</a>
          </div>
          @endif
        </div>
      </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Emails</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Document</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Document</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($emails as $email)
                        <tr>
                            <td>{{$email->first__name}} {{$email->last__name}}</td>
                            <td>{{$email->__email}}</td>
                            <td>{{$email->__phone}}</td>
                            <td>{{Illuminate\Support\Str::limit(($email->__message), 200)}}</td>
                            <td>@if($email->__document == '' || $email->__document == NULL) <em>No document</em> @else<a href="{{asset($email->__document)}}"> Download file</a> @endif </td>
                            <td>{{$email->created_at}}</td>
                            <td>
                                <a class="btn bg-secondary-fmf text-muted "
                                    href="{{url('ad/emails/'.$email->id .'/edit')}}">Reply</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $emails->links() }} --}}
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection