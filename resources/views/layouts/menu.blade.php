<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Rebar Africa is a construction company that delivers high quality, reliable construction services for governmental establishments. In addition, we have broad expertise with commercial clients.">
    <meta name="keywords" content="Design and Construction">
    <meta name="generator" content="rebar.co.za/">
    <meta name="author" content="Tafara Shamu">
    <meta itemprop="name" content="Rebar Africa">
    <meta itemprop="url" content="https://rebar.co.za/">
    <meta property="og:site_name" content="Rebar Africa">
    <meta property="og:url" content="https://rebar.co.za/">
    <meta property="og:type" content="website">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rebar Africa') }}</title>

    <!-- favicon -->
    <link rel="manifest" href="{{ asset('/images/favi/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/favi/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/favi/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/images/favi/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favi/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/images/favi/site.webmanifest') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=open-sans" rel="stylesheet">
{{--    <link rel="stylesheet" href={{url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css")}}>--}}
    <link rel="stylesheet" href={{url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css")}} integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @if(App::environment(['production']))
        <!-- Global site tag (gtag.js) - Google Analytics -->
{{--        <script async src="https://www.googletagmanager.com/gtag/js?id=G-HP5NTY9YF1"></script>--}}
{{--        <script>--}}
{{--            window.dataLayer = window.dataLayer || [];--}}

{{--            function gtag() {--}}
{{--                dataLayer.push(arguments);--}}
{{--            }--}}

{{--            gtag('js', new Date());--}}

{{--            gtag('config', 'G-HP5NTY9YF1');--}}
{{--        </script>--}}
    @endif


</head>
<body>
<div id="app">
    <nav class="custom-menu navbar navbar-expand-md text-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('/images/png/logo.png')}}" width="250"  alt="Rebar Africa">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav m-auto text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('welcome') }}">{{ __('Home') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark"
                           href="{{ route('reinforcing-steel') }}">{{ __('Reinforcing Steel') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark"
                           href="{{ route('concrete-scanning') }}">{{ __('Concrete Scanning') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark"
                           href="{{ route('rebar-scanning') }}">{{ __('Rebar Scanning') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark"
                           href="{{ route('structural-steelworks') }}">{{ __('Structural Steelworks') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('services') }}">{{ __('Other Services') }}</a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary font-weight-bold" href="{{ route('contact-us') }}">{{ __('Contact us') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @include('partials.banners.hero')

    @include('partials.quick-contact')
    <main class="py-0">
        @yield('content')
    </main>
</div>

@yield('scripts')
</body>
</html>
