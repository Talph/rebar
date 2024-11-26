@if(request()->route()->named('welcome'))
    @include('partials.banners.video-hero')
@else
    @include('partials.banners.banner')
@endif


