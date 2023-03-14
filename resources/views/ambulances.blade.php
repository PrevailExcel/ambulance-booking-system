@extends('layouts.master')
@section('title')
    List
@endsection
@section('body')
    <section class="bg-theme position-relative">
        <div class="container-fluid text-center p-5">
            <div class="row">
                <div class="text-center text-white">
                    <h2 class="fw-bold">Ambulance List</h2>
                    <p class="text-muted"><i class="fa fa-house"></i> Home / Ambulances</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 position-relative bg-light">
        <div class="container pb-3">
            <h1 class="display-5 fw-800 lh-3 mt-5 pb-2">
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
                                    <li class="shadow"><a href="" data-tip="Quick View">
                                        @if ($amb->booked)
                                        <i class="fa fa-lock"></i>
                                        @else
                                        <i class="fa fa-unlock"></i>
                                        @endif
                                            
                                            </a></li>
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
@endsection
