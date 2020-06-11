@extends('layouts.frontend.app')

@section('title', 'Agenda| Về chúng tôi')

@section('background_header')
    <div class="page-header contact-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Giới thiệu.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @include('layouts.frontend.introduce')
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
@endsection
