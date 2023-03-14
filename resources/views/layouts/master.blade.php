<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="theme-color" content="var(--secColor)" />

    <title>@yield('title') - Ambulance Booking System</title>
</head>

<body class="bg-light">
    <div class="moon"></div>
    <nav class="navbar navbar-expand-lg navbar-light text-white">
        <div class="container py-lg-2">
            <a href="/" class="text-decoration-none"><b class="navbar-brand text-theme" href="#"><img
                        src="{{ asset('assets/images/logo.png') }}" height="60"> Ambulance Booking</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ambualance.list') }}">List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}/#how">How it works</a>
                    </li>
                </ul>

                <form class="d-flex">
                    <a href="{{ route('dashboard') }}"><button class="btn bg-theme btn-dark border-0 px-5"
                            type="button">Book Now</button></a>
                </form>
            </div>
        </div>
    </nav>


    @yield('body')



    <section class="text-dark position-relative">
        <div class="container px-5 p-4">
            <p class="d-flex justify-content-center align-items-center">
            <h1 class="me-3 pb-3"><span class="pb-1 active">Get Started Now</span></h1>
            <p class="lead">
                Bala blu mpower broooom youths tia-tia eneme different our blu from. Bala blu bala generated cassava blu
                different corn pdapc.
            </p>
            <button type="button" class="btn btn-dark btn-rounded">
                Register Now For Free
            </button>
            </p>
        </div>
        <!-- Grid container -->
    </section>

    <section class="bg-dark">
        <div class="container px-5 p-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted"><b class="navbar-brand text-theme" href="#"><img
                        src="{{ asset('assets/images/logo.png') }}" height="60"> Ambulance Booking</b>
                &copy; 2023
            </p>
        </div>
        <!-- Grid container -->
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    @yield('js')
</body>

</html>
