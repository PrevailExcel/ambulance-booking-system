@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{auth()->user()->hospital->name}}'s Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>


    <section class="containter-fluid">
        <div class="row gx-2">
            <div class="col-md-6 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-9 col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h4>Ambulances</h4>
                        <h2>{{ $stats['ambs'] }}</h2>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-4 p-3 text-center bg-theme-2">
                        <i class="fa fa-ambulance circle-icon text-white py-auto fs-3"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-9 col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h4>Bookings</h4>
                        <h2>₦{{ number_format($stats['profit']) }}</h2>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-4 p-3 text-center bg-theme">
                        <i class="fa circle-icon text-white py-auto fs-3 fw-bold">₦</i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="containter-fluid my-5">
        <div class="row g-2">
            <div class="px-2">
                <div class="card shadow-sm border-0">
                    <h2 class="card-header bg-light">Ambulances Booked</h2>
                    <div class="card-body col-md-8 offset-md-2">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Incident</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->ambulance->name }}</td>
                                            <td>{{ $booking->user->name }}</td>
                                            <td>{{ $booking->location }}</td>
                                            <td>{{ $booking->incident }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
