@extends('backend.layouts.dashboard')

@section('content')
<div class="container mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ml-0" href="/account/profile">Profile</a>
        <a class="nav-link" href="/account/security">Security</a>
        <a class="nav-link" href="/account/notifications">Notifications</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <form method="POST" action="" enctype="multipart/form-data">
                <!-- Profile picture card-->
                <div class="card">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="{{asset('images/profile-1.png')}}"
                            alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">

                    @include('partials.alert')

                    <form action="{{route('account.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Form Group (username)-->
                        <div class="form-group">
                            <label class="small mb-1" for="inputUsername">Username (how your name will appear to other
                                users on the site)</label>
                            <input class="form-control" id="inputUsername" name="username" type="text"
                                placeholder="Enter your username" value="{{Auth::user()->username}}">
                        </div>
                        <!-- Form Row-->
                        <div class="form-row">
                            <!-- Form Group (first name)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" name="fname" type="text"
                                    placeholder="Enter your first name" value="{{Auth::user()->fname}}">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" name="lname" type="text"
                                    placeholder="Enter your last name" value="{{Auth::user()->lname}}">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="form-row">
                            <!-- Form Group (organization name)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputProfTitle">Job title</label>
                                <input class="form-control" id="inputProfTitle" type="text" name="professional_title"
                                    placeholder="Enter your professional title"
                                    value="{{Auth::user()->details->professional_title}}">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputLocation">Location</label>
                                <input class="form-control" id="inputLocation" type="text" name="location"
                                    placeholder="Enter your location" value="{{Auth::user()->details->location}}">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" name="email" type="email"
                                placeholder="Enter your email address" value="{{Auth::user()->email}}">
                        </div>
                        <!-- Form Row-->
                        <div class="form-row">
                            <!-- Form Group (phone number)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" name="mobile" type="tel"
                                    placeholder="Enter your phone number" value="{{Auth::user()->details->mobile}}">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                <input class="form-control" id="inputBirthday" type="date" name="dob"
                                    placeholder="Enter your birthday" value="06/10/1988">
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="form-row">
                            <!-- Form Group (Biography)-->
                            <div class="form-group col-md-12">
                                <label class="small mb-1" for="inputBirthday">Bio overview</label>
                                <textarea class="form-control" id="inputBio"
                                    name="bio_overview">{{Auth::user()->details->bio_overview}}</textarea>
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="form-row">
                            <!-- Form Group (facebook links)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputFace">Facebook profile url</label>
                                <input class="form-control" id="inputFace" name="facebook" type="text"
                                    placeholder="Enter your facebook profile url"
                                    value="{{Auth::user()->details->facebook}}">
                            </div>
                            <!-- Form Group (linkedIn link)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputLinkedin">LinkedIn profile url</label>
                                <input class="form-control" id="inputLinkedIn" name="linkedin" type="text"
                                    placeholder="Enter your linkedin profile url"
                                    value="{{Auth::user()->details->linkedin}}">
                            </div>
                        </div>

                        <!-- Form Row-->
                        <div class="form-row">
                            <!-- Form Group (phone number)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputTwit">Twitter profile url</label>
                                <input class="form-control" id="inputTwit" name="twitter" type="text"
                                    placeholder="Enter your Twitter profile url"
                                    value="{{Auth::user()->details->twitter}}">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="inputWeb">Website url</label>
                                <input class="form-control" id="inputWeb" name="website" type="text"
                                    placeholder="Enter your Website url" value="{{Auth::user()->details->website}}">
                            </div>
                        </div>

                        <!-- Save changes button-->
                        <input class="btn btn-primary" value="Save changes" type="submit" />
                    </form>
                </div>
            </div>
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
            $('#inputBio').summernote({
                tabsize: 2,
                height: 200
            });      
          });
</script>
@endsection