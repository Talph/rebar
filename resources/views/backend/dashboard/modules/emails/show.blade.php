@extends('backend.layouts.dashboard')

@section('content')

<div class="container">
  <div class="animated fadeIn">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Email </h1>
    <div class="row">
      <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
        <div class="card">
          <div class="card-header">
            Email: {{ $email->__email }}</div>
          <div class="card-body">
            <a href="mailto:{{ $email->__email }}"
                class="btn btn-primary">{{ __('Reply') }}</a>
            <br/>
            <br/>
            <br/>
            <h4>Author:</h4>
            <p> {{ $email->first__name .' '. $email->last__name }}</p>
            <h4>Title:</h4>
            <p> {{ $email->__email }}</p>
            <h4>Phone:</h4>
            <p> {{ $email->__phone }}</p>
            <h4>Message:</h4>
            <p>{{ $email->__message }}</p>
            <h4>Date sent:</h4>
            <p>{{ $email->created_at }}</p>
            <h4>Attachment:</h4>
            <p> {{ $email->getFirstMediaUrl() }}</p>
            <a href="{{ route('emails.index') }}" class="btn btn-primary">{{ __('Return') }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('javascript')

@endsection