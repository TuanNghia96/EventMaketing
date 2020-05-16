{{--{{ dd() }}--}}
<nav class="fh5co-nav" role="n  avigation">
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <div id="fh5co-logo"><a href="{{ route('home') }}">Event Countdown<strong>.</strong></a></div>
            </div>
            <div class="col-xs-10 text-right menu-1">
                <ul>
                    <li class="header_button @if(url()->full() == route('home')) active @endif" id="homeHeader"><a href="{{ route('home') }}">Home</a></li>
                    <li class="header_button @if(request()->is('event/*')) active @endif" id="eventHeader"><a href="{{ route('event.index') }}">Event</a></li>
                    @if(Auth::user())
                        @if(Auth::user()->role == \App\Models\User::ENTERPRISE)
                            <li id="" class="header_button has-dropdown">
                                <a href="{{ route('enterprises.show') }}">Enterprise</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('event.create') }}">Make Event</a></li>
                                    <li><a href="#">Main Event</a></li>
                                    <li><a href="#">Join Event</a></li>
                                    <li><a href="#">List Event</a></li>
                                </ul>
                            </li>
                        @elseif(Auth::user()->role == \App\Models\User::BUYER)
                            <li id="" class="header_button has-dropdown">
                                <a href="gallery.html">Member</a>
                                <ul class="dropdown">
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">CSS3</a></li>
                                    <li><a href="#">Sass</a></li>
                                    <li><a href="#">jQuery</a></li>
                                </ul>
                            </li>
                        @endif
                    @endif
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
                            <a href="#">{{ Auth::user()->user_name }}</a>
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

