@extends('backend.layouts.dashboard')

@section('content')
<div class="container mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link" href="/account/profile">Profile</a>
        <a class="nav-link" href="/account/security">Security</a>
        <a class="nav-link active ml-0" href="/account/notifications">Notifications</a>
    </nav>
    <hr class="mt-0 mb-4">

    <notifications-component></notifications-component>

</div>
@endsection