<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a href="{{ route('users.index') }}" id="bigheader">
        <h2 class="text-white">Monstart Lab Lifetime</h2>
    </a>
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>
<div id="flash" class="w-100">
    @include('flash::message')
</div>
<div class="container" id="head">
    <div class="row caption">
        <div>
            <legend class="col">@yield('title')</legend>
        </div>
        @can('admin')
            @yield('btnAdd')
        @endcan
    </div>
</div>
