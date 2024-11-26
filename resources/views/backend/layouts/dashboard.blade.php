<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="manifest" href="{{asset("images/favicon/manifest.json")}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="author" content="Tafara Shamu">
    <meta itemprop="name" content="AfrFinity">
    <meta itemprop="url" content="https://rebar.co.za/">
    <meta property="og:site_name" content="Rebar Africa">
    <meta property="og:url" content="https://rebar.co.za/">
    <meta property="og:type" content="website">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=open-sans" rel="stylesheet">
    {{--    <link rel="stylesheet" href={{url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css")}}>--}}
    <link rel="stylesheet" href={{url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css")}} integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body id="page-top">
<div id="app">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Side Bar Menu -->
        @include('backend.partials.sideBarMenu')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('backend.partials.topBarMenu')
                @yield('content')
            </div>
            @include('backend.partials.footer')
        </div>
    </div>
</div>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
@yield('scripts')


<script type="text/javascript">
    $(document).ready(function () {
        $('#J_name').keyup(function (e) {
            var str = $('#J_name').val();
            str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
            $('#J_slug').val(str);
            $('#J_slug').attr('value', str);
        });
    });
</script>

</body>

</html>
