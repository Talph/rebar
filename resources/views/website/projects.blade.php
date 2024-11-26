<?php
$arrow = '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
              </svg>';
?>

@extends('layouts.menu')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="page-header pt-4">
                    <h2>Projects</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <p class="text-muted blockquote mb-0">Rebar Africa strive to act as an interface to
                    engage the public
                    in our vision for a liveable, sustainable and affordable future for our cities and
                    neighbourhoods. {!!$arrow!!}</p>
            </div>
        </div>

        @include('partials.project-table')
        @include('partials.project-showcase')
    </div>
    </div>
    @include('partials.footer')
@endsection

{{--<IfModule mime_module>--}}
{{--    AddHandler application/x-httpd-alt-php80___lsphp .php .php8 .phtml--}}
{{--</IfModule>--}}
