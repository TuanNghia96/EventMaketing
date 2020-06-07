<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <figure class="footer-logo">
                    <a href="#"><img src="{{ asset('frontend/images/logo.png')}}" alt="logo"></a>
                </figure>

                <nav class="footer-navigation">
                    <ul class="flex flex-wrap justify-content-center align-items-center">
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
                        <li><a href="{{ route('event.news') }}">News</a></li>
                        <li><a href="{{ route('contact.about') }}">About us</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </nav>

                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/nghia.batuan" target="_blank">Nghia.nbt</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                <div class="footer-social">
                    <ul class="flex flex-wrap justify-content-center align-items-center">
                        <li><a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://www.instagram.com/?hl=vi"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.facebook.com/nghia.batuan"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/?lang=vi#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
