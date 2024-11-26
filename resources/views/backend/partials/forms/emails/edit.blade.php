@extends('backend.layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit email</h1>

    <div class="createProduct my-4">
        <a class="btn btn-success" href={{route('emails.create')}}>{{__('Create New Email')}}</a>
    </div>

    <div class="row">

        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
              {{ __('Received email') }}</div>
            <div class="card-body">
            <div class="row">
                <div class="col-md-12"><em class="font-weight-bold">Email number:</em> {{$email->id}}</div>
                <div class="col-md-12 mt-1"><em class="font-weight-bold">First name:</em> {{$email->first__name}}</div>
                <div class="col-md-12 mt-1"><em class="font-weight-bold">Last Name:</em> {{$email->last__name}}</div>
                <div class="col-md-12 mt-1"><em class="font-weight-bold">Client's email address:</em> {{$email->__email}}</div>
                <div class="col-md-12 mt-3"><em class="font-weight-bold">Brief:</em> <br>{{$email->__message}}</div>

                <div class="col-md-12 mt-3"><em class="font-weight-bold">Document:</em> <br>@if($email->__document == '' || !$email->__document) <em>No file attached</em> @else<a class="link" href="{{asset($email->__document)}}">Download </a>@endif</div>

            </div>
</div>
</div>
        </div>

        <div class="col-md-6">
            @include('partials.alert')
            <form method="POST" action="">
                @csrf
                @method('POST')

                <div class="card">
                    <div class="card-header">
                      {{ __('Reply email') }}</div>
                    <div class="card-body">
                      @include('partials.alert')

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="label">
                                Email to
                            </label>
                            <input type="email" aria-details="email" class="form-control"
                                name="__email" value="{{$email->__email}}" disabled required>
                        </div>
                    </div>
                </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="label">
                                    Subject
                                </label>
                                <input type="text" aria-details="subject" class="form-control"
                                    name="__subject">
                            </div>
                        </div>
                    </div>
                            
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="label">
                                    Message
                                </label>
                                <textarea type="text"  id="summernote" rows='10' class="form-control"
                                    name="__message"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                                <input type="submit" value="Send email" class="btn btn-success">
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<!-- Page level plugin CSS-->
<link href="{{ asset('vendor/summernote/summernote.min.css')}}" rel="stylesheet">
<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/summernote/summernote.min.js')}}"></script>
<script>
  $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 200
            });      
          });
</script>
@endsection