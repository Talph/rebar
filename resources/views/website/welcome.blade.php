@extends('layouts.menu')

@section('content')
    <div class="home-page">

        <div class="container-fluid bg-navy p-0">
            <div class="row">
                <div class="col-md-6 brief__container_">
                    <h3 class="text-primary">10 years of experience</h3>
                    <h1>
                        We're Industrious. A Company To Change The construction industry.
                    </h1>
                    <p class="brief_p">
                        Rebar Africa (pty) ltd is established in 2013 to become the innovative and reliable South
                        sub-Saharan reinforcement and welded mesh manufacturers and suppliers.
                    </p>

                    <p class="brief_p">
                        Rebar Africa’s aim is to bridge the demand for reinforcement and welded Mesh due to ongoing
                        urbanization and government initiatives to improve infrastructure. Our high-quality
                        reinforcement steel and welded mesh are fabricated in accordance with ISO 9001 and SANS
                        50025:2004 and wholly conforms to structural engineering modern designs</p>

                    <p class="brief_p">
                        We further guarantee a supply lead duration of 3-5 days due to the highest production capacity
                        of our Tecmo Croppers and Benders imported from Italy. In case of some material storage
                        constraint on site, we present the contractor with an option to manufacture and supply our
                        reinforcement in phases aligned with the contractor’s methodology at a fix cost. <a
                            class="link text-primary" href="{{route('about')}}">Find out more about rebar</a>
                    </p>
                </div>
                <div class="col-md-6 brief_img_container_ p-0">
                </div>
            </div>
        </div>
        <div class="container-fluid bg-navy p-0">
            <div class="row">
                <div class="col-md-6 brief__container_ bg-white">
                    <h3 class="text-primary">Activities From Beginning To End</h3>
                    <p class="text-dark h1">
                        Create, Enhance and Sustain.
                    </p>
                    <p class="brief_p text-dark">
                        We also offer precise reinforcement and concrete scanning services for structural analysis. Our
                        in-house highly experienced personnel ensure the utmost attention to details during scanning of
                        concrete & reinforcement which yield accurate reports for structural analysis Purposes.
                    <p class="brief_p text-dark">Rebar Africa (pty) LTD aims to offer competitive pricing in response to
                        the challenges posed by a highly flooded construction industry. This approach ensures that the
                        clients can align their reinforcement, welded mesh and structural scanning scopes with their
                        allowable while still receiving quality materials & precise structural scanning services.</p>

                    <p class="brief_p text-dark">
                        <a class="link text-white btn lead btn-lg bg-primary h3 px-5 py-3" href="{{route('services')}}">View
                            All Services</a>
                    </p>
                </div>
                <div class="col-md-6 brief__container_">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Reinforcing Steel</h3>
                            <p>Rebar Africa specializes in providing high-quality reinforcing steel for concrete
                                structures, ensuring strength and durability. Our steel reinforcement solutions support
                                a wide range of projects, from residential buildings to large-scale infrastructure,
                                enhancing structural integrity and safety.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h3>Concrete scanning</h3>
                            <p>Rebar Africa’s concrete scanning service uses advanced technology to detect rebar,
                                conduits, and voids, ensuring safe and precise modifications. Rely on us for accurate
                                insights and enhanced project safety.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h3>Rebar scanning </h3>
                            <p>Rebar Africa’s rebar scanning service accurately detects and maps rebar within concrete
                                structures, ensuring safe and precise modifications. Trust us for reliable insights and
                                enhanced project safety.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h3>Safety and Compliance</h3>
                            <p>With safety being paramount in the our services, Rebar emphasizes compliance with
                                rigorous safety standards and regulations. This commitment extends to the well-being of
                                workers and the surrounding environment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('partials.project-showcase')
        @include('partials.footer')
    </div>

@endsection

{{--@extends('layouts.menu')--}}

{{--@section('content')--}}


{{--@endsection--}}
