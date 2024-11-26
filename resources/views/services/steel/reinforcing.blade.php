@extends('layouts.menu')

@section('content')
    <section class="mt-5">
        <div class="container pt-lg-5">
            <div class="row">
                <div class="col-md-6">
                    <h2>Reinforcing steel</h2>
                    <p>
                        Rebar is a wholly black-owned turn-key construction and project management company. It was
                        founded in Zimbabwe in 2001 and got registered in south Africa in 2007. Our core business is
                        structural steelwork design, fabrication and erection. Our experience dates back more than 10
                        years ago, when we started with fabrication of service station canopies and other structural
                        steel and pipework related to the oil industry.
                    </p>
                    <p>
                        This experience has allowed us to diversify into various steel construction applications ranging
                        from high security fencing and gates to sophisticated large span roofs and mining structures.
                        Being a multi-disciplinary engineering and construction project activities are mainly based on
                        the Turn-Key procurement model. Turn-Key projects are perfect for our valuable clients that need
                        to focus on their daily operations and can not afford to get intimately involved with the
                        intricacies of the daily project activities.
                    </p>
                    <p>
                        However our approach is not only limited to yhe Turn-Key model, we also participate in the
                        conventional projects as engineering consultants or project managers or tender as main
                        contractors or specialist sub-contractors.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('/images/projects/06.jpg')}}" class="card-img-top" alt="project image">
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row py-5">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3"><i class="fa-regular fa-clipboard text-primary fa-5xl"></i></div>
                        <div class="col-md-9">
                            <h4>Project Management</h4>
                            <p>Rebar's project management professionals oversee every aspect of the project,
                                ensuring efficient coordination, timely execution, and effective communication between
                                all parties involved.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3"><i class="fa-regular fa-heart text-primary fa-5xl"></i></div>
                        <div class="col-md-9">
                            <h4>Environmental Considerations</h4>
                            <p>Rebar integrates environmental sustainability into its civil engineering projects.
                                This involves considering factors like environmental impact assessments, eco-friendly
                                materials, and energy-efficient design principles.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3"><i class="fa-solid fa-list-check text-primary fa-5xl"></i></div>
                        <div class="col-md-9">
                            <h4>Quality Assurance</h4>
                            <p>Quality is a priority at Rebar. Stringent quality control measures are applied
                                throughout the process, from design and fabrication to erection, guaranteeing a final
                                product that meets or exceeds industry standards.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid bg-black my-5 p-5">
            <div class="container my-5 p-5">
                <div class="row justify-content-center">
                    <div class="col-md-3 text-center display-4">100%</div>
                    <div class="col-md-3 text-center display-4">120K</div>
                    <div class="col-md-3 text-center display-4">500k+</div>
                    <div class="col-md-3 text-center display-4">50+</div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row py-5">
                <div class="col-md-6">
                    <img src="{{asset('/images/projects/mvra.jpg')}}" class="card-img-top" alt="project image">
                </div>
                <div class="col-md-6">
                    <h2 class="text-uppercase mb-4 text-dark">Projects </h2>
                    <p>
                        Rebar stands as a trusted leader in executing a diverse range of projects across various
                        industries (SteelWorks, Civil Engineering and Oil). With a proven track record of excellence,
                        innovation, and commitment to client
                        satisfaction, Rebar consistently delivers successful projects that meet the highest
                        industry standards. From construction and engineering to infrastructure development,
                        Rebar's projects exemplify their expertise, dedication, and ability to navigate complex
                        challenges.
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{asset('/images/projects/traffic-boards.jpg')}}" class="card-img-top" alt="project image">
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('/images/projects/fuel-tanks.jpg')}}" class="card-img-top" alt="project image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection
