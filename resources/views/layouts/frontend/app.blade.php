<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Event Countdown &mdash; 100% Free Fully Responsive HTML5</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO"/>
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive"/>

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    @yield('inline_css')

    <!-- Modernizr JS -->
    <script src="{{ asset('frontend/js/modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->
<!--[if lt IE 9]>
	<script src="{{ asset('frontend/js/respond.min.js') }}"></script>

	<![endif]-->

</head>
<body>
@include('layouts.frontend.header')
<div id="app" class="app-body flex-grow-1">
    <div id="page">
        @yield('content')
        @include('layouts.frontend.footer')
    </div>
</div>

<!-- VueJs -->
<script src="{{ asset('/js/app.js') }}"></script>
<!-- jQuery -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<!-- jQuery Easing -->
<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<!-- Carousel -->
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<!-- countTo -->
<script src="{{ asset('frontend/js/jquery.countTo.js') }}"></script>

<!-- Stellar -->
<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/magnific-popup-options.js') }}"></script>

<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js') }}"></script> -->
<script src="{{ asset('frontend/js/simplyCountdown.js') }}"></script>
<!-- Main -->
<script src="{{ asset('frontend/js/main.js') }}"></script>

@yield('inline_script')
</body>
</html>
