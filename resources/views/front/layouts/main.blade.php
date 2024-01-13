<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@stack('title')</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">

    @yield('meta')

    <!-- Favicon -->
    {{-- <title>{{ array_key_exists('general_nama_app', $settings) ? $settings['general_nama_app'] : '' }}</title> --}}
    <link rel="icon" type="image/x-icon" href="{{ array_key_exists('general_frontpage_favicon', $settings) ? img_src($settings['general_frontpage_favicon'], 'settings') : '' }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ template_startup('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ template_startup('lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    {{-- <link rel="stylesheet" href="{{template_startup('lib/bootstrap/bootstrap.min.css')}}" type="text/css"> --}}
    <link href="{{ template_startup('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ template_startup('css/style.css') }}" rel="stylesheet">

    @stack('css')
</head>

<body>
    <!-- Spinner Start -->
    @include('front.layouts.preloader')
    <!-- Spinner End -->


    <!-- Topbar Start -->
    @include('front.layouts.topbar')
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">

        @include('front.layouts.navbar')

        @stack('head')
    </div>
    <!-- Navbar & Carousel End -->


    <!-- Full Screen Search Start -->
    @include('front.layouts.search-modal')
    <!-- Full Screen Search End -->

    @yield('content')

    <!-- Vendor Start -->
    @include('front.layouts.client')
    <!-- Vendor End -->

    <!-- Footer Start -->
    @include('front.layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="javascript:void(0)" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{ asset('jquery/dist/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{template_startup('lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ template_startup('lib/wow/wow.min.js') }}"></script>
    <script src="{{ template_startup('lib/easing/easing.min.js') }}"></script>
    <script src="{{ template_startup('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ template_startup('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ template_startup('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ template_startup('js/main.js') }}"></script>

    @stack('js')
</body>

</html>
