@extends('layouts.master')
@section('title')
    {{ auth()->user()->name }} - Profile
@endsection
@section('body')
    <section class="bg-theme position-relative">
        <div class="container-fluid text-center p-5">
            <div class="row">
                <div class="text-center text-white">
                    <h2 class="fw-bold">{{ auth()->user()->name }}</h2>
                    <p class="text-muted"><i class="fa fa-house"></i> Home / Profile</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 position-relative bg-white">
        <div class="container pb-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-theme-2 active" id="profile-tab" data-bs-toggle="tab"
                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="true">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-theme-2" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">Booking history</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-theme-2" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="false">Edit Profile</button>
                </li>
            </ul>
            <div class="tab-content my-5" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="row mb-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">First Name</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->name }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Last Name</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->name }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Phone number</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->phone }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Email</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Registered</label>
                        </div>
                        <div class="col-md-8 col-6">
                            {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d M, Y') }}
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-sm-3 mb-5 col-md-2 col-5">
                            <label style="font-weight:bold;">Booked</label>
                        </div>
                        <div class="col-md-8 col-6">
                            3
                        </div>
                    </div>

                    <div class="row mb-5"></div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div
                                class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column ">
                                    <strong class="d-inline-block mb-2 text-primary">12 Feb, 2023</strong>
                                    <h3 class="mb-0">Ambulance VF34</h3>
                                    <div class="text-muted">Hospital name</div>
                                    <small class="small">#3000</small>
                                </div>
                                <div class="col-auto my-auto d-none d-lg-block">
                                    <img src="{{ asset('assets/images/amb2.jpg') }}" class="img-fluid" width="200"
                                        height="150">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column ">
                                    <strong class="d-inline-block mb-2 text-primary">12 Feb, 2023</strong>
                                    <h3 class="mb-0">Ambulance VF34</h3>
                                    <div class="text-muted">Hospital name</div>
                                    <small class="small">#3000</small>
                                </div>
                                <div class="col-auto my-auto d-none d-lg-block">
                                    <img src="{{ asset('assets/images/amb6.jpg') }}" class="img-fluid" width="200"
                                        height="150">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column ">
                                    <strong class="d-inline-block mb-2 text-primary">12 Feb, 2023</strong>
                                    <h3 class="mb-0">Ambulance VF34</h3>
                                    <div class="text-muted">Hospital name</div>
                                    <small class="small">#3000</small>
                                </div>
                                <div class="col-auto my-auto d-none d-lg-block">
                                    <img src="{{ asset('assets/images/amb7.jpg') }}" class="img-fluid" width="200"
                                        height="150">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}"
                                id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}"
                                id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email"
                                value="{{ auth()->user()->email }}" required>
                            <div class="invalid-feedback">
                                Valid email required.
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone"
                                value="{{ auth()->user()->phone }}" required>
                            <div class="invalid-feedback">
                                Valid phone number is required.
                            </div>
                        </div>

                        <div class="col-sm-12 my-5">
                            <button type="button" class="btn btn-primary bg-theme-2 border-0">
                                Edit Profile
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
