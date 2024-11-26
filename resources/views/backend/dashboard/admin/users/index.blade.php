@extends('backend.layouts.dashboard')

@section('content')

<div class="container">
  <div class="animated fadeIn">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">System Users </h1>
    <div class="createProduct my-4">
      <a class="btn btn-primary" href={{route('users.create')}}>{{__('Create new user')}}</a>
    </div>
    <div class="row">

      <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
        <form method="POST" action="{{ route('users.store') }}">

          <div class="card">
            <div class="card-header">
              </i> {{ __('Create user') }}</div>
            <div class="card-body">
              @include('partials.alert')
              @csrf
              <div class="form-group row">
                <label>First Name</label>
                <input class="form-control" type="text" placeholder="{{ __('Name') }}" value="{{old('name')}}"
                  name="name" required autofocus>
              </div>

              <div class="form-group row">
                <label>Email Address</label>
                <input class="form-control" type="email" placeholder="{{ __('user@email.com') }}"
                  value="{{old('email')}}" name="email" required autocomplete="on" autofocus>
              </div>

              <div class="form-group row">
                <label>Role</label>
                <select class="form-control" name="user_role">
                  <option value="">Select user role</option>
                  @foreach ($roles as $role)
                  <option value='{{$role->id}}'>{{ucfirst($role->name)}}</option>
                  @endforeach
                </select>
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
                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                  autocomplete="new-password">

              </div>

              <button class="btn btn-block btn-success" type="submit">{{ __('Create User') }}</button>

            </div>
          </div>


        </form>

      </div>

      <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card">
          <div class="card-header">
            </i> {{ __('Users') }}</div>
          <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-hover" id="dataTable" width="100%"
              cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr>
                  <th>Email Address</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Date Created</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->name}}</td>
                  <td>
                    {{$user->relatedRoles == 'admin'}}
                    @foreach ($user->RelatedRoles as $role)
                    {{$role->slug}}
                    @endforeach
                  </td>
                  <td>{{ date('Y-m-d',$user->created) }}</td>
                  <td>{{ $user->status }}</td>
                  <td>
                    <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkUsers"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        aria-label="Users action button">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLinkUsers">
                        <div class="dropdown-header">Actions:</div>
                        
                        @if($role->slug != 'admin')
                        <a href="{{ url('/ad/users/' . $user->id) }}" class="btn dropdown-item">View</a>
                        <a href="{{ url('/ad/users/' . $user->id . '/edit') }}" class="btn dropdown-item">Edit</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('users.destroy', $user->id ) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button class="btn dropdown-item text-danger">Delete</button>
                        </form>
                        @else
                        <span class="p-1">No actions for this user</span>
                        @endif
                      </div>
                      </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')

@endsection