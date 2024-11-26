<div id="carousel-rebar" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="overlay"></div>
            <img class="d-block w-100" src="{{asset('images/jpeg/about-banner.jpg')}}" alt="Rebar Africa">
            <div class="carousel-caption d-none d-md-block container">
                <h1 class="text-dark">{{ucfirst(str_replace('-', ' ', request()->segment(count(request()->segments()))))}}</h1>
                <p class="text-dark breadcrumb-item">
                    <a href="{{route('welcome')}}">Home</a>&nbsp;|&nbsp;{{str_replace('-', ' ', request()->segment(count(request()->segments())))}}
                </p>
            </div>
        </div>
    </div>
</div>
