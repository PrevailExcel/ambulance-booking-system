@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ambulances</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn bg-theme text-white me-2"><i class="fa fa-plus"> </i> New</button>
        </div>
    </div>

    <section class="containter-fluid my-5">
        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card shadow-sm border-0">
                    <h4 class="card-header bg-light">Registered Ambulances</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Driver's Email</th>
                                        <th scope="col">Drivers's Number</th>
                                        <th scope="col">Currently Booked</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ambulances as $ambulance)
                                        <tr>
                                            <td class="text-center fw-bold pb-1">{{ $ambulance->name }}
                                                <br>
                                                <img src="{{ asset('assets/images/' . $ambulance->image) }}"
                                                    class="img-fluid rounded-3" style="height:40px;width:60px" />
                                            </td>
                                            <td>₦{{ number_format($ambulance->price) }}</td>
                                            <td>{{ $ambulance->email }}</td>
                                            <td>{{ $ambulance->phone }}</td>
                                            <td>
                                                @if ($ambulance->booked)
                                                    <span class="px-4 bg-theme text-white rounded">True</span>
                                                @else
                                                    <span class="px-4 bg-theme-2 text-white rounded">False</span>
                                                @endif &nbsp;{{ $ambulance->bookings->count() }}
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" id="' + data.id + '" role="button"
                                                    class="ml-1 editPack"><i class="text-primary fa fa-edit"> <span
                                                            class="d-none d-md-inline-block"> </span></i></a>
                                                <a href="javascript:void(0)" class="delPack" id="' + data.id + '"><i
                                                        class="text-danger fa fa-trash"> <span
                                                            class="d-none d-md-inline-block"> </span></i></a>
                                            </td>
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
