<div class="container-fluid my-5 project-container">
    <div class="row">
        <div class="col-md-4">
            <div class="card project-container-card">
                <img src="{{asset('/images/projects/fabrication.jpg')}}" class="card-img-top image" alt="project image">
                <div class="card-body overlay-data">
                    <h4 class="card-title">Paper cup mockup</h4>
                    <p>Innovations enabled by the Steeler institutes.</p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="project-specification project-client-name mt-30">
                                <h6><i class="flaticon-check-mark"></i> Client:</h6>
                                <p>Biston Mechanical</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="project-specification project-submit mt-30">
                                <h6><i class="flaticon-check-mark"></i> Project Done:</h6>
                                <p>26.10.2018</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card project-container-card">
                <img src="{{asset('/images/projects/building.jpg')}}" class="card-img-top image" alt="project image">
                <div class="card-body overlay-data">
                    <h4 class="card-title">Paper cup mockup</h4>
                    <p>Innovations enabled by the Steeler institutes.</p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="project-specification project-client-name mt-30">
                                <h6><i class="flaticon-check-mark"></i> Client:</h6>
                                <p>Biston Mechanical</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="project-specification project-submit mt-30">
                                <h6><i class="flaticon-check-mark"></i> Project Done:</h6>
                                <p>26.10.2018</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card project-container-card">
                <img src="{{asset('/images/projects/fuel-tanks.jpg')}}" class="card-img-top image" alt="project image">
                <div class="card-body overlay-data">
                    <h4 class="card-title">Paper cup mockup</h4>
                    <p>Innovations enabled by the Steeler institutes.</p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="project-specification project-client-name mt-30">
                                <h6><i class="flaticon-check-mark"></i> Client:</h6>
                                <p>Biston Mechanical</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="project-specification project-submit mt-30">
                                <h6><i class="flaticon-check-mark"></i> Project Done:</h6>
                                <p>26.10.2018</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card project-container-card">
                <img src="{{asset('/images/projects/traffic-boards.jpg')}}" class="card-img-top image" alt="project image">
                <div class="card-body overlay-data">
                    <h4 class="card-title">Paper cup mockup</h4>
                    <p>Innovations enabled by the Steeler institutes.</p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="project-specification project-client-name mt-30">
                                <h6><i class="flaticon-check-mark"></i> Client:</h6>
                                <p>Biston Mechanical</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="project-specification project-submit mt-30">
                                <h6><i class="flaticon-check-mark"></i> Project Done:</h6>
                                <p>26.10.2018</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card project-container-card">
                <img src="{{asset('/images/projects/mvra.jpg')}}" class="card-img-top image" alt="project image">
                <div class="card-body overlay-data">
                    <h4 class="card-title">Motor Vehicle registration Authority</h4>
                    <p>Innovations enabled by the Steeler institutes.</p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="project-specification project-client-name mt-30">
                                <h6><i class="flaticon-check-mark"></i> Client:</h6>
                                <p>Biston Mechanical</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="project-specification project-submit mt-30">
                                <h6><i class="flaticon-check-mark"></i> Project Done:</h6>
                                <p>26.10.2018</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card project-container-card">
                <img src="{{asset('/images/projects/steel-work.jpg')}}" class="card-img-top image" alt="project image">
                <div class="card-body overlay-data">
                    <h4 class="card-title">Paper cup mockup</h4>
                    <p>Innovations enabled by the Steeler institutes.</p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="project-specification project-client-name mt-30">
                                <h6><i class="flaticon-check-mark"></i> Client:</h6>
                                <p>Biston Mechanical</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="project-specification project-submit mt-30">
                                <h6><i class="flaticon-check-mark"></i> Project Done:</h6>
                                <p>26.10.2018</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(!request()->route()->named('projects'))
        <div class="home-projects-section text-center my-5">
            <a class="btn lead btn-lg bg-primary h3 px-5 py-3 text-white" href="/projects">
                View All Projects
            </a>
        </div>
    @endif

</div>
