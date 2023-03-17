@extends('layouts.master')
@section('title')
    Checkout {{ $ambulance->name }}
@endsection
@section('body')
    <section class="bg-theme position-relative">
        <div class="container-fluid text-center p-5">
            <div class="row">
                <div class="text-center text-white">
                    <h2 class="fw-bold">Chechout {{ $ambulance->name }}</h2>
                    <p class="text-muted"><i class="fa fa-house"></i> Home / Ambulances / {{ $ambulance->name }} / Checkout
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 position-relative bg-white">
        <div class="container pb-3">

            @error('email')
                <div class="my-4 p-3 alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
            
            <main>
                <div class="py-5">
                </div>

                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <div class="position-sticky" style="top: 2rem;">
                            @if (!auth()->user() || auth()->user()->type != 1)
                                <div class="d-flex justify-content-between mb-3">
                                    <span>Have an account already? For faster checkout:</span>
                                    <form method="POST" action="{{ route('login.to.checkout') }}">
                                        @csrf
                                        <input type="hidden" value="{{ $ambulance->id }}" name="ambulance">
                                        <button class="btn btn-primary bg-theme-2 border-0" type="submit">Login</button>
                                    </form>
                                </div>
                                <hr>
                            @endif
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-theme-2">Your ambulance</span>
                                <span class="badge bg-theme-2 rounded-pill">1</span>
                            </h4>
                            <ul class="list-group my-3">
                                <li class="list-group-item d-flex justify-content-between lh-sm ">
                                    <img class="img-fluid rounded" height="70" style="max-height: 70px; max-width: 90px;"
                                        src="{{ asset('assets/images/' . $ambulance->image) }}" />
                                    <div>
                                        <h6 class="my-0 fw-bold">{{ $ambulance->name }}</h6>
                                        <small class="text-theme">{{ $ambulance->hospital->name }}</small><br>
                                        <small class="text-theme fs-small">{{ $ambulance->hospital->address }}</small>
                                    </div>
                                    <span class="text-muted">₦{{ number_format($ambulance->price) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between py-3">
                                    <span>Total (NGN)</span>
                                    <strong>₦{{ number_format($ambulance->price) }}</strong>
                                </li>
                            </ul>
                            <button class="w-100 btn btn-primary bg-theme-2 border-0 btn-lg" type="submit">Continue to
                                checkout</button>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">
                            @if (!auth()->user() || auth()->user()->type != 1)
                                Billing details
                            @else
                                {{ auth()->user()->name }}
                            @endif
                        </h4>
                        <form class="needs-validation" novalidate method="POST" action="{{ route('book') }}">
                            @csrf

                            <div class="row g-3">
                                @if (!auth()->user() || auth()->user()->type != 1)
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">Full name</label>
                                        <input type="text" name="name" class="form-control" id="firstName"
                                            placeholder="Your full name" value="{{ old('name') }}" required>
                                        <div class="invalid-feedback">
                                            Valid name is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" name="phone" class="form-control" id="phone"
                                            placeholder="08012345678" value="{{ old('phone') }}" required>
                                        <div class="invalid-feedback">
                                            Valid phone number required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="youremail@example.com" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Valid email required.
                                        </div>
                                    </div>
                                @endif

                                <div class="col-sm-6">
                                    <label for="incident" class="form-label">Incident</label>
                                    <input type="text" name="incident" class="form-control" list="datalistOptions"
                                        id="incident" value="{{ old('incident') }}" placeholder="Type to search...">
                                    <datalist id="datalistOptions">
                                        <option value="Accident">
                                        <option value="Maternity">
                                        <option value="Death">
                                        <option value="Fire">
                                        <option value="Crime scene">
                                    </datalist>
                                    <div class="invalid-feedback">
                                        Valid Incident required.
                                    </div>
                                </div>

                                @if (!auth()->user() || auth()->user()->type != 1)
                                    <div class="col-12">
                                    @else
                                        <div class="col-sm-6">
                                @endif

                                <label for="address" class="form-label">Current Location</label>
                                <input type="text" name="location" class="form-control" id="address"
                                    placeholder="1234 Main St" value="{{ old('location') }}" required>
                                <div class="invalid-feedback">
                                    Please enter your current location address.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="long" class="form-label">Longtitude</label>
                                <input type="text" class="form-control" id="long" name="long"
                                    value="{{ old('long') }}" readonly required>
                                @error('long')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="lat" class="form-label">Latitude</label>
                                <input type="text" class="form-control" name="lat" id="lat"
                                    value="{{ old('lat') }}" readonly required>
                                @error('lat')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <input type="hidden" name="ambulance" value="{{ $ambulance->id }}">
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Payment
                        <i class="fa fa-cc-mastercard text-theme-2 fs-3 me-2"></i>
                        <i class="fa fa-cc-visa text-theme-2 fs-3 me-2"></i>
                        <i class="fa fa-cc-amex text-theme-2 fs-3 me-2"></i>
                        <i class="fa fa-cc-paypal text-theme-2 fs-3"></i>
                    </h4>

                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label">Name on card</label>
                            <input type="text" class="form-control" value="{{ old('ccname') }}" name="ccname"
                                id="cc-name" placeholder="" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cstCCNumber" class="form-label">Credit card number</label>
                            <input type="text" class="form-control" value="{{ old('cstCCNumber') }}"
                                name="cstCCNumber" id="cstCCNumber"
                                value=""onkeyup="cc_format('cstCCNumber','cstCCardType');" placeholder="" required>
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-expiration" class="form-label">Expiration</label>
                            <input type="text" class="form-control" name="ccexp" id="cc-expiration" maxlength='5'
                                onkeyup="formatString(event);" value="{{ old('ccexp') }}" placeholder="mm/yy" required>
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label">CVV</label>
                            <input type="tel" class="form-control" id="cc-cvv" name="cccvv" maxlength="3"
                                minlength="3" placeholder="123" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary bg-theme-2 border-0 btn-lg" type="submit">Continue to
                        checkout</button>
                    </form>
                </div>
        </div>
        </main>
        </div>
    </section>
@endsection


@section('js')
    <script>
        var lat = document.getElementById("lat");
        var long = document.getElementById("long");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("On your device location to use this service");
            }
        }

        function showPosition(position) {
            lat.value = "Latitude: " + position.coords.latitude;
            long.value = "Longitude: " + position.coords.longitude;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.")
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.")
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.")
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.")
                    break;
            }
        }

        function cc_format(ccid, ctid) {
            // supports Amex, Master Card, Visa, and Discover
            // parameter 1 ccid= id of credit card number field
            // parameter 2 ctid= id of credit card type field

            var ccNumString = document.getElementById(ccid).value;
            ccNumString = ccNumString.replace(/[^0-9]/g, '');
            // mc, starts with - 51 to 55
            // v, starts with - 4
            // dsc, starts with 6011, 622126-622925, 644-649, 65
            // amex, starts with 34 or 37
            var typeCheck = ccNumString.substring(0, 2);
            var cType = '';
            var block1 = '';
            var block2 = '';
            var block3 = '';
            var block4 = '';
            var formatted = '';

            if (typeCheck.length == 2) {
                typeCheck = parseInt(typeCheck);
                if (typeCheck >= 40 && typeCheck <= 49) {
                    cType = 'Visa';
                } else if (typeCheck >= 51 && typeCheck <= 55) {
                    cType = 'Master Card';
                } else if ((typeCheck >= 60 && typeCheck <= 62) || (typeCheck == 64) || (typeCheck == 65)) {
                    cType = 'Discover';
                } else if (typeCheck == 34 || typeCheck == 37) {
                    cType = 'American Express';
                } else {
                    cType = 'Invalid';
                }
            }

            // all support card types have a 4 digit firt block
            block1 = ccNumString.substring(0, 4);
            if (block1.length == 4) {
                block1 = block1 + ' ';
            }

            if (cType == 'Visa' || cType == 'Master Card' || cType == 'Discover') {
                // for 4X4 cards
                block2 = ccNumString.substring(4, 8);
                if (block2.length == 4) {
                    block2 = block2 + ' ';
                }
                block3 = ccNumString.substring(8, 12);
                if (block3.length == 4) {
                    block3 = block3 + ' ';
                }
                block4 = ccNumString.substring(12, 16);
            } else if (cType == 'American Express') {
                // for Amex cards
                block2 = ccNumString.substring(4, 10);
                if (block2.length == 6) {
                    block2 = block2 + ' ';
                }
                block3 = ccNumString.substring(10, 15);
                block4 = '';
            } else if (cType == 'Invalid') {
                // for Amex cards
                block1 = typeCheck;
                block2 = '';
                block3 = '';
                block4 = '';
                alert('Invalid Card Number');
            }

            formatted = block1 + block2 + block3 + block4;
            document.getElementById(ccid).value = formatted;
            document.getElementById(ctid).value = cType;
        }

        function formatString(e) {
            var inputChar = String.fromCharCode(event.keyCode);
            var code = event.keyCode;
            var allowedKeys = [8];
            if (allowedKeys.indexOf(code) !== -1) {
                return;
            }

            event.target.value = event.target.value.replace(
                /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
            ).replace(
                /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
            ).replace(
                /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
            ).replace(
                /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
            ).replace(
                /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
            ).replace(
                /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
            ).replace(
                /\/\//g, '/' // Prevent entering more than 1 `/`
            );
        }

        getLocation();
    </script>
@endsection
