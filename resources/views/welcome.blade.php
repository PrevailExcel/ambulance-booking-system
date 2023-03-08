@extends('layouts.master')
@section('title')
    Home
@endsection
@section('body')
    <section>
        <div class="container col-xxl-8 px-4 py-5 position-relative">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5 text-white">
                <div class="col-10 col-sm-8 col-lg-6 d-none d-md-block">
                    <div class="hero-image-container p-5">
                        <img src="{{ asset('assets/images/amb.png') }}" class="" width="500" height="400"
                            loading="lazy">
                    </div>
                </div>
                <div class="col-lg-6">
                    <legend class="hero-tab rounded-pill p-2 small">
                        <span class="rounded-pill px-2 bg-theme me-3">New</span>
                        <span>Get an ambulance nearest to you</span>
                    </legend>
                    <h1 class="display-2 fw-800 lh-3 mb-3">Emergency care that delivers</h1>
                    <p class="lead">When and where it matters most, get an ambulance and save a life now.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <div class="form-floating">
                            <input type="email" class="form-control form-control-sm" id="floatingInput" placeholder="">
                            <label for="floatingInput" class="text-dark"><i class="fa fa-map-marker"> </i>
                                Location</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-sm" id="floatingInput2" placeholder="">
                            <label for="floatingInput2" class="text-dark"><i class="fa fa-phone"> </i> Phone</label>
                        </div>
                        <button class="btn btn-dark border-0 bg-theme">Book now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="container mt-5 py-5">
            <div class="row py-5">
                <div class="col-lg-6 pt-3">
                    <small class="text-theme fw-bold">What We Do <span
                            class="text-decoration-underline fs-1">&nbsp;&nbsp;&nbsp;&nbsp;</span></small>
                    <h1 class="display-5 fw-800 lh-3 mb-3">
                        We provide
                        unparallelled
                        healthcare transport
                    </h1>

                    <p>Snap your fingers and we’ll be there! Our emergency services are available where and when you
                        need them the most with no hidden charges.
                        Bala blu electricty blu cassava bala 50million blu cassava bala from electricty bala. Different
                        tia-tia bala cassava garri down-payment our. Tia-tia down-payment symbol cassava bala symbol eba
                        electricty bala our our bala highway.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="me-auto row">
                        <div class="col-md-5 m-2 p-5 border-0 card shadow-lg text-center">
                            <i class="fs-2 fa fa-ambulance text-theme-2"></i>
                            <b>Ambulance Booking</b>
                        </div>
                        <div class="col-md-5 m-2 p-5 border-0 card shadow-lg text-center">
                            <i class="fs-2 fa fa-medkit text-theme-2"></i>
                            <b>Emergency Response</b>
                        </div>
                        <div class="col-md-5 m-2 p-5 border-0 card shadow-lg text-center">
                            <i class="fs-2 fa fa-plus-square text-theme-2"></i>
                            <b>Ambulance Standby</b>
                        </div>
                        <div class="col-md-5 m-2 p-5 border-0 card shadow-lg text-center">
                            <i class="fs-2 fa fa-ambulance text-theme-2"></i>
                            <b>Ambulance Booking</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-theme">
        <div class="container-fluid text-center p-5">
            <div class="row">
                <div class="d-flex justify-content-evenly text-white">
                    <div class="count display-2">
                        63
                        <h5 class="text-theme-2">Vehicles</h6>
                    </div>
                    <div class="count display-2">
                        10,903
                        <h5 class="text-theme-2">Lives saved</h6>
                    </div>
                    <div class="count display-2">
                        6
                        <h5 class="text-theme-2">Avg. ETA <small class="small text-sm">(mins)</small></h6>
                    </div>
                    <div class="count display-2">
                        7,903
                        <h5 class="text-theme-2">Bookings</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-5 fw-800 lh-3 mt-5 pb-2">
                Available Ambulances
            </h1>
            <div class="row pt-3">
                @foreach ($ambulances as $amb)
                    <div class="col-md-3 col-sm-6 col-xs-6 col-6 mb-3">
                        <div class="product-grid5">
                            <div class="product-image5">
                                <a href="{{ route('ambualance.details', $amb->id) }}" style="overflow:hidden !important;">
                                    <img class="pic-1 fill-image" style="height: 250px !important;"
                                        src="{{ asset('assets/images/' . $amb->image) }}">
                                    <img class="pic-2 fill-image" style="height: 250px !important;"
                                        src="{{ asset('assets/images/' . $amb->image) }}">
                                </a>
                                <ul class="social">
                                    <li class="shadow"><a href="" data-tip="Quick View"><i
                                                class="fa fa-search"></i></a></li>
                                    <li class="shadow"><a href="" data-tip="Add to Wishlist"><i
                                                class="fa fa-shopping-bag"></i></a></li>
                                    <li class="shadow"><a href="" data-tip="Add to Cart"><i
                                                class="fa fa-hospital-o"></i></a></li>
                                </ul>
                                <a href="{{ route('ambualance.details', $amb->id) }}" class="select-options shadow"><i
                                        class="fa fa-arrow-right"></i>
                                    Book Now</a>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a
                                        href="{{ route('ambualance.details', $amb->id) }}">{{ $amb->name }}</a></h3>
                                <small class="text-muted">{{ $amb->hospital->name }}</small>
                                <div class="price">₦{{ number_format($amb->price) }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="container py-5">

            <h1 class="display-5 fw-800 lh-3 mt-5 pb-3">
                How it works
            </h1>

            <div class="row py-3 mb-5 g-4">
                <div class="col mx-3 p-4 shadow">
                    <i class="fs-2 mb-3 fa fa-hand-pointer-o text-theme circle-icon"></i>
                    <p class="fw-bold">Click on the 'Book Now' button</p>
                </div>
                <div class="col mx-3 p-4 shadow">
                    <i class="fs-2 mb-3 fa fa-credit-card text-theme-2 circle-icon"></i>
                    <p class="fw-bold">Select the ambulance service you want</p>
                </div>
                <div class="col mx-3 p-4 shadow">
                    <i class="fs-2 mb-3 fa fa-space-shuttle text-theme circle-icon"></i>
                    <p class="fw-bold">Request goes out to Responders</p>
                </div>
                <div class="col mx-3 p-4 shadow">
                    <i class="fs-2 mb-3 fa fa-ambulance text-theme-2 circle-icon"></i>
                    <p class="fw-bold">Ambulance arrives at your location</p>
                </div>
            </div>
        </div>
    </section>
@endsection
