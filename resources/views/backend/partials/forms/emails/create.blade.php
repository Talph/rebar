@extends('backend.layouts.dashboard')

@section('content')
<!-- Begin Page Content -->
<div class="container">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create Email</h1>
    <div class="row">
        <div class="col-md-8">
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
                                name="__email[]" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="link" data-toggle="collapse" href="#collapseCC" role="button" aria-expanded="false" aria-controls="collapseCC"><label class="label">
                                cc
                            </label> </a>
                            <span class="collapse" id=collapseCC>
                            <input type="email" aria-details="email" class="form-control"
                                name="__email[]" required>
                                </span>
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