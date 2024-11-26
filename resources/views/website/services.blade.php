@extends('layouts.menu')

@section('content')

    <div class="container services-page">
        <h1 class="text-center mt-5">Our Expertise</h1>
        <div class="row py-4 my-2 justify-content-center">
            <div class="col-md-4 card">
                <div class="row">
                    <div class="col-md-3"><i aria-hidden="true" class="fas fa-tools text-primary fa-5xl"></i></div>
                    <div class="col-md-9">
                        <h4 class="text-uppercase">Steel Fixing</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 card">
                <div class="row">
                    <div class="col-md-3">
                        <i aria-hidden="true" class="fas fa-cubes-stacked text-primary fa-5xl"></i>
                    </div>
                    <div class="col-md-9">
                        <h4 class="text-uppercase">Rib and Block Slabs</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 card">
                <div class="row">
                    <div class="col-md-3">
                        <i aria-hidden="true" class="fas fa-oil-well text-primary fa-5xl"></i>
                    </div>
                    <div class="col-md-9">
                        <h4 class="text-uppercase">Rebar Scanning</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 card">
                <div class="row">
                    <div class="col-md-3"><i aria-hidden="true" class="fas fa-tools text-primary fa-5xl"></i></div>
                    <div class="col-md-9">
                        <h4 class="text-uppercase">Concrete Scanning</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 card">
                <div class="row">
                    <div class="col-md-3">
                        <i aria-hidden="true" class="fas fa-cubes-stacked text-primary fa-5xl"></i>
                    </div>
                    <div class="col-md-9">
                        <h4 class="text-uppercase">Reinforcing Steel</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 card">
                <div class="row">
                    <div class="col-md-3">
                        <i aria-hidden="true" class="fas fa-oil-well text-primary fa-5xl"></i>
                    </div>
                    <div class="col-md-9">
                        <h4 class="text-uppercase">Welded Mesh</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 card">
                <div class="row">
                    <div class="col-md-3"><i aria-hidden="true" class="fas fa-tools text-primary fa-5xl"></i></div>
                    <div class="col-md-9">
                        <h4 class="text-uppercase">Pile Cages</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4 card">
                <div class="row">
                    <div class="col-md-3">
                        <i aria-hidden="true" class="fas fa-cubes-stacked text-primary fa-5xl"></i>
                    </div>
                    <div class="col-md-9">
                        <h4 class="text-uppercase">Pre-assembly</h4>
                    </div>
                </div>
            </div>
{{--            <div class="col-md-4 card">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-3">--}}
{{--                        <i aria-hidden="true" class="fas fa-oil-well text-primary fa-5xl"></i>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-9">--}}
{{--                        <h4 class="text-uppercase">Oil Industry</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

    </div>

    @include('partials.why-choose-rebar')

    @include('partials.project-showcase')
    @include('partials.footer')
@endsection



