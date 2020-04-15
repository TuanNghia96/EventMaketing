<nav class="fh5co-nav" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <div id="fh5co-logo"><a href="{{ route('home') }}">Event Countdown<strong>.</strong></a></div>
            </div>
            <div class="col-xs-10 text-right menu-1">
                <ul>
                    <li class="header_button" id="homeHeader"><a href="{{ route('home') }}">Home</a></li>
                    <li class="header_button" id="eventHeader" ><a href="{{ route('event.index') }}">Event</a></li>
                    <li id="" class="header_button has-dropdown">
                        <a href="services.html">Services</a>
                        <ul class="dropdown">
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">eCommerce</a></li>
                            <li><a href="#">Branding</a></li>
                            <li><a href="#">API</a></li>
                        </ul>
                    </li>
                    <li id="" class="header_button has-dropdown">
                        <a href="gallery.html">Gallery</a>
                        <ul class="dropdown">
                            <li><a href="#">HTML5</a></li>
                            <li><a href="#">CSS3</a></li>
                            <li><a href="#">Sass</a></li>
                            <li><a href="#">jQuery</a></li>
                        </ul>
                    </li>
                    <li class="header_button" id=""><a href="{{ route('contact.about') }}">About Us</a></li>
                    <li class="header_button" id=""><a href="{{ route('contact') }}">Contact</a></li>
                    <li id="" class="header_button has-dropdown">
                        @guest
                            <a href="#">User</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Sign In</a></li>
                            </ul>
                        @else
.21                            <a href="#">{{ Auth::user()->user_name }}</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('login') }}">Info</a></li>
                                <li><a href="{{ route('logout') }}">Log out</a></li>
                            </ul>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>

    </div>
</nav>

