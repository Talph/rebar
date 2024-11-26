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
    <form method="POST" action="{{ route('users.store') }}">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
          <form method="POST" action="{{ route('users.store') }}">

            <div class="card p-4">
              <div class="card-header">
                </i> {{ __('Create user') }}</div>
              <div class="card-body">
                @include('partials.alert')
                @csrf
                <div class="form-group row">
                  <label>First Name</label>
                  <input class="form-control" type="text" placeholder="{{ __('first name') }}" value="{{old('fname')}}"
                    name="fname" required autofocus>
                </div>
                <div class="form-group row">
                  <label>Last Name</label>
                  <input class="form-control" type="text" placeholder="{{ __('Last Name') }}" value="{{old('lname')}}"
                    name="lname" required autofocus>
                </div>

                <div class="form-group row">
                  <label>Username</label>
                  <input class="form-control" type="text" placeholder="{{ __('User Name') }}"
                    value="{{old('username')}}" name="username" required autofocus>
                </div>

                <div class="form-group row">
                  <label>Email Address</label>
                  <input class="form-control" type="email" placeholder="{{ __('user@email.com') }}"
                    value="{{old('email')}}" name="email" required autofocus>
                </div>

                <div class="form-group row">
                  <label>Role</label>
                  <select class="role form-control" name="role" id="role">
                    <option value="">Select Role...</option>
                    @foreach ($roles as $role)
                    <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">
                      {{$role->name}}</option>
                    @endforeach
                  </select>

                </div>

                <div class="form-group row">
                  <label>Description</label>
                  <textarea class="form-control" id="summernote" name="category_description" rows="9"
                    required> {{old('category_description')}}</textarea>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>


                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group row">
                  <label for="password-confirm"
                    class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    required autocomplete="new-password">

                </div>

                <button class="btn btn-block btn-success" type="submit">{{ __('Create User') }}</button>

              </div>
            </div>


          </form>

        </div>
      </div>
    </form>
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