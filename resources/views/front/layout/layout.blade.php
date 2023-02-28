<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- BOOTRSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />

    <!-- FONTAWESONE CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/fontawesome.min.css') }}" />


    <!-- SLICKSLIDER CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css') }}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- SCRIPT: BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SCRIPT: SLICKSLIDER -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://kit.fontawesome.com/4f677940c5.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- SCRIPT: CUSTOM -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <title>Nicole-Barnes</title>

</head>

<body>
    @php
        $date = Date('Y')
    @endphp


    <section class="sectionheader">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light " data-aos="zoom-in-up" data-aos-duration="3000">
                <a class="navbar-brand" href="#"></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="" role="button"><i class="fa fa-bars" aria-hidden="true"
                            style="color:#e6e6ff"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav  p-3" style="margin:auto">
                        <li class="nav-item active">
                            <a class="active" href="{{ route('web.home') }}" style="color:white;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="{{ route('web.write') }}" style="color:white;">Writer</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="{{ route('web.professor') }}" style="color:white;">Professor</a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="{{ route('web.human') }}" style="color:white;">Human</a>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>
    </section>
    @yield('content')

    <section class="footer1">
        <div class="container">
            <div class="col-md-12 text-center mt-5">
                <h1>{{ $footer->name??null }}</h1>
                <p><strong>Email:&nbsp </strong>{{ $footer->email??null }}</p>
                <hr>
            </div>

            <div class="col-md-12 text-center">
                <p>© {{ $date }} All rights reserved by {{ $footer->name??null }}</p>
            </div>
        </div>
    </section>
    <script>
        AOS.init();
    </script>
</body>

</html>
