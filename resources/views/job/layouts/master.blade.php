<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JobEntry - Job Portal Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="landing/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    @livewireStyles
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('dashboards/landing/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboards/landing/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Boostrap Stylesheet -->
    <link href="{{asset('dashboards/landing/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Styleheet -->
    <link href="{{asset('dashboards/landing/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        @include("job.layouts.includes.navbar")
        <!-- Navbar End -->


        @yield("content")
        <!-- Testimonial End -->

        @include("job.layouts.includes.footer")

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield("script")
    <script src="{{asset('dashboards/landing/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('dashboards/landing/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('dashboards/landing/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('dashboards/landing/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('dashboards/landing/js/main.js')}}"></script>
    <!-- Template Javascript -->
    @livewireScripts
</body>

</html>
