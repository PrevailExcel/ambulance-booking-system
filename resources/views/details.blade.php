@extends('layouts.master')
@section('title')
    {{ $ambulance->name }}
@endsection
@section('body')
    <section class="bg-theme position-relative">
        <div class="container-fluid text-center p-5">
            <div class="row">
                <div class="text-center text-white">
                    <h2 class="fw-bold">{{ $ambulance->name }}</h2>
                    <p class="text-muted"><i class="fa fa-house"></i> Home / Ambulances / {{ $ambulance->name }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 position-relative bg-white">
        <div class="container pb-3">
            <div class="amb card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img class="img-fluid"
                                        src="{{ asset('assets/images/' . $ambulance->image) }}" />
                                </div>
                            </div>
                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title">{{ $ambulance->name }}</h3>
                            <p><i class="fa fa-hospital-o"> </i>
                                - {{ $ambulance->hospital->name }}
                            </p>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="review-no">3/5 reviews</span>
                            </div>
                            <p class="product-description">
                                Bala blu bala recruit different symbol bala bulaba roasted townhall 50million. Townhall line
                                townhall eneme umbreleda generated bala. Super our bala bala electricty umbreleda army blu
                                different roasted super. Eneme our tia-tia different roasted agbado bala.
                            </p>
                            <p class="text-theme-2">
                                @if ($ambulance->booked)
                                    Not Available
                                @else
                                    Available
                                @endif
                            </p>
                            <h4 class="price">current price: <span>₦{{ number_format($ambulance->price) }}</span></h4>

                            <div class="action">
                                <a href="{{ route('checkout', $ambulance->id) }}"><button class="add-to-cart btn btn-default px-4"
                                        @if ($ambulance->booked) disabled @endif
                                        type="button">Chechout</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
