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
    <title>Wedding &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO"/>
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive"/>
    <meta name="author" content="FREEHTML5.CO"/>

    <!--
      //////////////////////////////////////////////////////
  
      FREE HTML5 TEMPLATE
      DESIGNED & DEVELOPED by FREEHTML5.CO
      
      Website: 		http://freehtml5.co/
      Email: 			info@freehtml5.co
      Twitter: 		http://twitter.com/fh5co
      Facebook: 		https://www.facebook.com/fh5co
  
      //////////////////////////////////////////////////////
       -->

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

    <!-- Modernizr JS -->
    <script src="{{ asset('frontend/js/modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->
<!--[if lt IE 9]>
	<script src="{{ asset('frontend/js/respond.min.js') }}"></script>
	<![endif]-->

</head>
<body>

<div class="fh5co-loader"></div>

<div id="page">
    <nav class="fh5co-nav" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div id="fh5co-logo"><a href="index.blade.php">Wedding<strong>.</strong></a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li><a href="index.blade.php">Home</a></li>
                        <li><a href="about.html">Story</a></li>
                        <li class="has-dropdown">
                            <a href="services.html">Services</a>
                            <ul class="dropdown">
                                <li><a href="#">Web Design</a></li>
                                <li><a href="#">eCommerce</a></li>
                                <li><a href="#">Branding</a></li>
                                <li><a href="#">API</a></li>
                            </ul>
                        </li>
                        <li class="has-dropdown">
                            <a href="gallery.html">Gallery</a>
                            <ul class="dropdown">
                                <li><a href="#">HTML5</a></li>
                                <li><a href="#">CSS3</a></li>
                                <li><a href="#">Sass</a></li>
                                <li><a href="#">jQuery</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="contact.blade.php">Contact</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url({{ asset('frontend/images/img_bg_1.jpg') }});">
        <div class="overlay"></div>
        <div class="fh5co-container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Contact Us</h1>
                            <h2>Hãy gửi chia sẻ, thắc mắc về chúng tôi <a href="{{ route('home') }}" target="_blank">Event Countdown</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="fh5co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-6 animate-box">
                    <h3>Liên lạc với chúng tôi</h3>
                    <form method="post" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="fname">Họ Tên *</label>
                                <input type="text" id="fname" name="name" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lname">Số điện thoại</label>
                                <input type="text" id="lname" name="phone" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email">Tên công ty(nếu là doanh nghiệp)</label>
                                <input type="text" id="cname" name="company_name" class="form-control" placeholder="">
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="subject">Tiêu đề</label>
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="message">Tin nhắn.</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Gửi" class="btn btn-primary">
                        </div>

                    </form>
                </div>
                <div class="col-md-5 col-md-pull-5 animate-box">

                    <div class="fh5co-contact-info">
                        <h3>Thông tin liên lạc</h3>
                        <ul>
                            <li class="address">1 Đại Cồ Việt, Bách Khoa, <br> Hai Bà Trưng, Hà Nội, Việt Nam</li>
                            <li class="phone"><a href="tel://1234567920">+84 398 100 765 </a></li>
                            <li class="email"><a href="mailto:nguyenbatuannghia5996@gmail.com">nguyenbatuannghia5996@gmail.com</a></li>
                            <li class="url"><a href="http://gettemplates.co">gettemplates.co</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div id="map" class="fh5co-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6963246222776!2d105.84315191421346!3d21.004806686011364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1588602925441!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- END map -->

    <footer id="fh5co-footer" role="contentinfo">
        <div class="container">

            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
                        <small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
                    </p>
                    <ul class="fh5co-social-icons">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </footer>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

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

</body>
</html>

