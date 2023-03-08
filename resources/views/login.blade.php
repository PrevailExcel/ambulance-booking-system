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

    <title>Login - Ambulance Booking System</title>

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
                    <h2>Login to your dashboard to book an ambulance</h2>
                    <p class="text-theme">Go Back.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="row">
                    <form class="my-auto mt-5 pt-5 px-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>

                        @if (session('alert'))
                            <span><strong class="text-danger mb-2">{{ session('alert') }}</strong></span>
                        @endif

                        <div class="form-group mb-4">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="current-password" required>
                        </div>
                        <button type="submit" class="btn btn-dark bg-theme border-0 px-5 py-2">Login</button>
                    </form>

                    <div class="clearfix"></div>
                    <div class="py-5 px-3 text-muted">
                        If you do not have an account, <a class="link-dark">register</a>.<br>
                        <a class="text-theme-2">Forgot password?</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
