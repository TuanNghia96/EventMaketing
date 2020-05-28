<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hello World</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css')}}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper.min.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/style.css')}}">
    @yield('inline_css')

</head>
<body>
<header class="site-header">
    <div class="header-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-10 col-lg-2 order-lg-1">
                    <div class="site-branding">
                        <div class="site-title">
                            <a href="{{ route('home') }}"><img src="{{ asset('frontend/images/logo.png')}}" alt="logo"></a>
                        </div><!-- .site-title -->
                    </div><!-- .site-branding -->
                </div><!-- .col -->

                <div class="col-2 col-lg-7 order-3 order-lg-2">
                    <nav class="site-navigation">
                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->

                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('event.index') }}">Events</a></li>
                            @if(Auth::user())
                                @if(Auth::user()->role == \App\Models\User::ENTERPRISE)
                                    <li><a href="{{ route('event.create') }}">Make Event</a></li>
                                    <li><a href="#">Main Event</a></li>
                                    <li><a href="#">Join Event</a></li>
                                    <li><a href="#">List Event</a></li>
                                @elseif(Auth::user()->role == \App\Models\User::BUYER)
                                    <li><a href="#">News</a></li>

                                @endif
                            @endif
                            <li><a href="{{ route('contact.about') }}">About us</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav><!-- .site-navigation -->
                </div><!-- .col -->

                <div class="col-lg-3 d-none d-lg-block order-2 order-lg-3">
                    <div class="buy-tickets">
                        @guest
                            <a class="btn gradient-bg" href="{{ route('login') }}">Login</a>
                        @else
                            <a class="btn gradient-bg" href="{{ route('logout') }}">Logout</a>
                        @endguest
                    </div><!-- .login -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .header-bar -->
    @yield('background_header')
</header><!-- .site-header -->
@yield('content')
@include('layouts.frontend.footer')
<script type='text/javascript' src='{{ asset('frontend/js/jquery.js')}}'></script>

<script type='text/javascript' src='{{ asset('frontend/js/masonry.pkgd.min.js')}}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/jquery.collapsible.min.js')}}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/swiper.min.js')}}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/jquery.countdown.min.js')}}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/circle-progress.min.js')}}'></script>
<script type='text/javascript' src='{{ asset('frontend/js/jquery.countTo.min.js')}}'></script>
@yield('inline_script')
</body>
</html>
