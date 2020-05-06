<nav class="fh5co-nav" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <div id="fh5co-logo"><a href="{{ route('home') }}">Event Countdown<strong>.</strong></a></div>
            </div>
            <div class="col-xs-10 text-right menu-1">
                <ul>
                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
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
                    <li><a href="{{ route('contact.about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    <li class="has-dropdown">
                        @guest
                            <a href="#">User</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="#">Sign In</a></li>
                            </ul>
                        @else

                            <a href="#">{{ Auth::user()->user->name }}</a>
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

