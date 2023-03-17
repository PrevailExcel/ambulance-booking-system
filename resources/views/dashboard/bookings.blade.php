@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bookings</h1>
    </div>

    <section class="containter-fluid my-5">
        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card shadow-sm border-0">
                    <h4 class="card-header bg-light">Bookings</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Ambulance</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Long & Lat</th>
                                        <th scope="col">Incident</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Time and Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->ambulance->name }}</td>
                                            <td>{{ $booking->location }} </td>
                                            <td>{{ $booking->long }} <br> {{ $booking->lat }}</td>
                                            <td>{{ $booking->incident }}</td>
                                            <td>{{ $booking->user->name }}</td>
                                            <td>{{ $booking->created_at->format('H:i A d M, Y') }}</td>
                                            <td>
                                                <a href="javascript:void(0)" id="' + data.id + '" role="button"
                                                    class="ml-1 editPack"><i class="text-primary fa fa-edit"> <span
                                                            class="d-none d-md-inline-block"> </span></i></a>
                                                <a href="javascript:void(0)" class="delPack" id="' + data.id + '"><i
                                                        class="text-danger fa fa-trash"> <span
                                                            class="d-none d-md-inline-block"> </span></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="my-4 p-3 alert alert-info">
                                            No Ambulance have been booked</a>.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
