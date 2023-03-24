<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="theme-color" content="var(--secColor)" />

    <title>Hospital Register - Ambulance Booking System</title>

    <style>
        .full {
            height: 100vh !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row full">
            <div class="col-md-8 col-sm-12 bg-dark bg-theme-2">
                <div class="text-white ps-5mt-3 mt-md-5">
                    <h2 class="text-theme">Hospital Registration Portal</h2>
                    <h3>Create an account with us to set your ambulances for emergencies</h3>
                    <p><a href="/" class="text-muted">Go Back.</a></p>
                    <div class="text-center">
                        <img src="{{asset('assets/images/hospital.png')}}" height="550" width="550" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="row">
                    <form class="my-auto mt-5 px-3" method="POST" action="{{ route('hospital.register') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <label>Hospital Name</label>
                            <input type="text" class="form-control" name="hospital_name" value="{{ old('hospital_name') }}"
                                placeholder="Hospital Name" required>
                            @error('hospital_name')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label>Hospital Address</label>
                            <input type="text" class="form-control" name="hospital_address" value="{{ old('hospital_address') }}"
                                placeholder="1234 Main st" required>
                            @error('hospital_address')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label>Manager's Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                placeholder="Full Name" required>
                            @error('name')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>                        
                        <div class="form-group mb-4">
                            <label>Manager's Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="youremail@example.com" required>
                            @error('email')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control" value="{{ old('phone') }}" name="phone"
                                placeholder="08123456789" required>
                            @error('phone')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                autocomplete="current-password" required>
                            @error('password')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark bg-theme border-0 px-5 py-2">Create Hospital Account</button>
                    </form>

                    <div class="clearfix"></div>
                    <div class="py-5 px-3 text-muted">
                        Have an account already? <a class="link-dark" href="{{ route('login') }}">Login</a>.<br>
                        <a class="text-theme-2">Terms & Conditions</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
