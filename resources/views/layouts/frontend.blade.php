<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">

    <!-- swiper -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/swiper-bundle.min.css') }}">

    <!-- datepicker -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.datetimepicker.css') }}">

    <!-- jquery ui -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery-ui.min.css') }}">

    <!-- common -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/common.css') }}">

    <!-- animations -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animations.css') }}">

    <!-- welcome -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/welcome.css') }}">

    <!-- home -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/home.css') }}">
</head>

<body class="scrollbar-hidden">

    <main class="home">
        @yield('content')
    </main>

    <!-- bottom navigation start -->
    @include('includes.bottom-navigation')
    <!-- bottom navigation end -->

    <!-- jquery -->
    <script src="{{ asset('assets/frontend/js/jquery-3.6.1.min.js') }}"></script>

    <!-- bootstrap -->
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>

    <!-- jquery ui -->
    <script src="{{ asset('assets/frontend/js/jquery-ui.js') }}"></script>

    <!-- mixitup -->
    <script src="{{ asset('assets/frontend/js/mixitup.min.js') }}"></script>

    <!-- gasp -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js"></script>

    <!-- draggable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/Draggable.min.js"></script>

    <!-- swiper -->
    <script src="{{ asset('assets/frontend/js/swiper-bundle.min.js') }}"></script>

    <!-- datepicker -->
    <script src="{{ asset('assets/frontend/js/jquery.datetimepicker.full.js') }}"></script>

    <!-- google-map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCodvr4TmsTJdYPjs_5PWLPTNLA9uA4iq8&callback=initMap"
        type="text/javascript"></script>

    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>
</body>

</html>
