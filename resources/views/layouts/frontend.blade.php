<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/details.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/explore.css') }}">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />


    @yield('css')
</head>

<body class="scrollbar-hidden">

    @yield('content')

    @if (!request()->routeIs('chatbot'))
        <a href="{{ route('chatbot') }}" class="chatbot">
            <i class="fa-solid fa-comment-dots text-white"></i>
        </a>
    @endif

    <!-- bottom navigation start -->
    @if (!request()->routeIs('chatbot') && !request()->routeIs('place.show'))
        @include('includes.bottom-navigation')
    @endif
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

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    @yield('js')
</body>

</html>
