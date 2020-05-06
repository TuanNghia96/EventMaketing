<html>
    @include('layouts.head')
    <body>
        {{-- header --}}
        @include('layouts.header')
        {{-- content --}}
            <div class="container">
                <div class="row justify-content-md-center">
                    @yield('content')
                </div>
            </div>
        {{-- footer --}}
        @include('layouts.footer')
    </body>
</html>
