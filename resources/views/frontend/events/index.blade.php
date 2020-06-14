@extends('layouts.frontend.app')

@section('title', 'Agenda| Tìm kiếm sự kiện')

@section('background_header')
    <div class="page-header events-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Tìm kiếm sự kiện.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div id="app">
        <search-event
                bg-url="{{ asset('frontend/images/img_bg_8.jpg') }}"
                url-detail="{{ route('event.detail', 999) }}"
                all-type="{{ json_encode($types) }}"
                all-category="{{ json_encode($categories) }}"
                url="{{ route('event.search') }}"
                ep-url="{{ route('event.ep_search') }}"
                url-event="{{ route('event.detail', 999) }}"
                all-event="{{ json_encode($events) }}"
                @can('buyer')
                is-buyer="1"
                @endcan
                @can('enterprise')
                is-ent="1"
                @endcan
                all-status="{{ json_encode(\App\Models\Event::$status) }}"
        >
        </search-event>
    </div>

    <script src="/js/app.js"></script>

    <div class="upcoming-events-outer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="upcoming-events">
                        <div class="upcoming-events-header">
                            <h4>Upcoming Events</h4>
                        </div>

                        <div class="upcoming-events-list">
                            <div class="upcoming-event-wrap flex flex-wrap justify-content-between align-items-center">
                                <figure class="events-thumbnail">
                                    <a href="#"><img src="{{ asset('frontend/images/upcoming-1.jpg') }}" alt=""></a>
                                </figure>

                                <div class="entry-meta">
                                    <div class="event-date">
                                        25<span>February</span>
                                    </div>
                                </div>

                                <header class="entry-header">
                                    <h3 class="entry-title"><a href="#">Blockchain Conference</a></h3>

                                    <div class="event-date-time">May 29, 2018 @ 8:00 Pm - May 30, 2018 @ 4:00 Am</div>

                                    <div class="event-speaker">Speackers: Maria Williams, Luis Smith, James Doe</div>
                                </header>

                                <footer class="entry-footer">
                                    <a href="#">Buy Tikets</a>
                                </footer>
                            </div>

                            <div class="upcoming-event-wrap flex flex-wrap justify-content-between align-items-center">
                                <figure class="events-thumbnail">
                                    <a href="#"><img src="{{ asset('frontend/images/upcoming-2.jpg') }}" alt=""></a>
                                </figure>

                                <div class="entry-meta">
                                    <div class="event-date">
                                        27<span>February</span>
                                    </div>
                                </div>

                                <header class="entry-header">
                                    <h3 class="entry-title"><a href="#">Financial Conference</a></h3>

                                    <div class="event-date-time">May 29, 2018 @ 8:00 Pm - May 30, 2018 @ 4:00 Am</div>

                                    <div class="event-speaker">Speackers: Maria Williams, Luis Smith, James Doe</div>
                                </header>

                                <footer class="entry-footer">
                                    <a href="#">Buy Tikets</a>
                                </footer>
                            </div>

                            <div class="upcoming-event-wrap flex flex-wrap justify-content-between align-items-center">
                                <figure class="events-thumbnail">
                                    <a href="#"><img src="{{ asset('frontend/images/upcoming-3.jpg') }}" alt=""></a>
                                </figure>

                                <div class="entry-meta">
                                    <div class="event-date">
                                        27<span>February</span>
                                    </div>
                                </div>

                                <header class="entry-header">
                                    <h3 class="entry-title"><a href="#">Winter Festival</a></h3>

                                    <div class="event-date-time">May 29, 2018 @ 8:00 Pm - May 30, 2018 @ 4:00 Am</div>

                                    <div class="event-speaker">Speackers: Maria Williams, Luis Smith, James Doe</div>
                                </header>

                                <footer class="entry-footer">
                                    <a href="#">Buy Tikets</a>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <figure class="footer-logo">
                        <a href="#"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"></a>
                    </figure>

                    <nav class="footer-navigation">
                        <ul class="flex flex-wrap justify-content-center align-items-center">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>

                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                    <div class="footer-social">
                        <ul class="flex flex-wrap justify-content-center align-items-center">
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="back-to-top flex justify-content-center align-items-center">
        <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1395 1184q0 13-10 23l-50 50q-10 10-23 10t-23-10l-393-393-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
    </div>
@endsection

