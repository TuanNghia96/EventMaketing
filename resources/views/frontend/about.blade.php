@extends('layouts.frontend.app')

@section('title', 'Agenda| Về chúng tôi')

@section('background_header')
    <div class="page-header contact-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Contact.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="homepage-info-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-5">
                    <figure>
                        <img src="{{ asset('frontend/images/logo-2.png')}}" alt="logo">
                    </figure>
                </div>

                <div class="col-12 col-md-8 col-lg-7">
                    <header class="entry-header">
                        <h2 class="entry-title">What is Agenda and why choose our services?</h2>
                    </header>

                    <div class="entry-content">
                        <p>Vestibulum eget lacus at mauris sagittis varius. Etiam ut venenatis dui. Nullam tellus risus, pellentesque at facilisis et, scelerisque sit amet metus. Duis vel semper turpis, ac tempus libero. Maecenas id ultrices risus. Aenean nec ornare ipsum, lacinia volutpat urna. Maecenas ut aliquam purus, quis sodales dolor.</p>
                    </div>

                    <footer class="entry-footer">
                        <a href="#" class="btn gradient-bg">Read More</a>
                        <a href="#" class="btn dark">Register Now</a>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="contact-location-details">
                    <h2 class="entry-title">Ha Noi</h2>

                    <div class="entry-content">
                        <p>Vestibulum eget lacus at mauris sagittis varius. Etiam ut venenatis dui. Nullam tellus risus, pellentesque at facilisis et.</p>
                    </div>

                    <footer class="entry-footer">
                        <ul>
                            <li class="contact-address">667889 Madison Avenue, no24-56</li>
                            <li class="contact-number">665 5667 8899 661</li>
                            <li class="contact-email"><a href="#">office@yourbusiness.com</a></li>
                        </ul>
                    </footer>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="contact-location-details">
                    <h2 class="entry-title">Da Nang</h2>

                    <div class="entry-content">
                        <p>Vestibulum eget lacus at mauris sagittis varius. Etiam ut venenatis dui. Nullam tellus risus, pellentesque at facilisis et.</p>
                    </div>

                    <footer class="entry-footer">
                        <ul>
                            <li class="contact-address">122344 Island Str, no23</li>
                            <li class="contact-number">665 5667 8899 661</li>
                            <li class="contact-email"><a href="#">office@yourbusiness.com</a></li>
                        </ul>
                    </footer>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="contact-location-details">
                    <h2 class="entry-title">Sai gon</h2>

                    <div class="entry-content">
                        <p>Vestibulum eget lacus at mauris sagittis varius. Etiam ut venenatis dui. Nullam tellus risus, pellentesque at facilisis et.</p>
                    </div>

                    <footer class="entry-footer">
                        <ul>
                            <li class="contact-address">667889 Long Avenue, no24-56</li>
                            <li class="contact-number">665 5667 8899 661</li>
                            <li class="contact-email"><a href="#">office@yourbusiness.com</a></li>
                        </ul>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-page-map">
        <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Bách Khoa, Hai Bà Trưng, Hà Nội, Việt Nam&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>

    <div class="newsletter-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h2 class="entry-title">Subscribe to our newsletter to get the latest trends & news</h2>
                        <p>Join our database NOW!</p>
                    </header>

                    <div class="newsletter-form">
                        <form class="flex flex-wrap justify-content-center align-items-center">
                            <div class="col-md-12 col-lg-3">
                                <input type="text" placeholder="Name">
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <input type="email" placeholder="Your e-mail">
                            </div>

                            <div class="col-md-12 col-lg-3">
                                <input class="btn gradient-bg" type="submit" value="Subscribe">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
