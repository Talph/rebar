@if(count($errors)>0)
<div class="alert alert-danger w-100 mx-auto mt-3">
    <ul class="list-unstyled text-small">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('message'))
<div class="alert alert-success">{{Session::get('message')}}</div>
@endif
@if(Session::has('err_message'))
<div class="alert alert-danger">{{Session::get('err_message')}}</div>
@endif