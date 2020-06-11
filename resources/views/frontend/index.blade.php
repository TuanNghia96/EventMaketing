@extends('layouts.frontend.app')

@section('title', 'Agenda| Trang chủ')

@section('background_header')
    <div class="page-header" data-date="" style="background: url('{{ asset('frontend/images/header-bg.jpg')}}') no-repeat">
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div class="col flex flex-column justify-content-center">
                        <div class="entry-header">
                        </div><!--- .entry-header -->

                        <div class="entry-footer">
                            {{--<a class="btn gradient-bg" href="#">Order here</a>--}}
                        </div><!-- .entry-footer" -->
                    </div><!-- .col -->
                </div><!-- .container -->
            </div><!-- .hero-content -->
        </div><!-- .swiper-slide -->
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
                        <a href="{{ route('contact.about') }}" class="btn gradient-bg">Read More</a>
                        @guest()
                            <a href="{{ route('register') }}" class="btn dark">Register Now</a>
                        @endguest
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <div class="swiper-container hero-slider">
        <div class="swiper-wrapper">
            @foreach($events as $key => $event)
                <div class="swiper-slide" data-date="{{ ($event->start_date > now()) ? $event->start_date : $event->end_date }}" style="background: url('{{ asset($event->avatar)}}') no-repeat;background-size:cover" >
                    <div class="hero-content">
                        <div class="container">
                            <div class="row">
                                <div class="col flex flex-column justify-content-center">
                                    <div class="entry-header">
                                        <div class="countdown flex align-items-center">
                                            <div class="countdown-holder flex align-items-baseline">
                                                <span class="dday"></span>
                                                <label>Ngày</label>
                                            </div><!-- .countdown-holder -->

                                            <div class="countdown-holder flex align-items-baseline">
                                                <span class="dhour"></span>
                                                <label>Giờ</label>
                                            </div><!-- .countdown-holder -->

                                            <div class="countdown-holder flex align-items-baseline">
                                                <span class="dmin"></span>
                                                <label>Phút</label>
                                            </div><!-- .countdown-holder -->

                                            <div class="countdown-holder flex align-items-baseline">
                                                <span class="dsec"></span>
                                                <label>Giây</label>
                                            </div><!-- .countdown-holder -->
                                        </div><!-- .countdown -->

                                        <h2 class="entry-title">{{ $event->name }}<br>{{ $event->title }}</h2>
                                    </div><!--- .entry-header -->

                                    <div class="entry-footer">
                                        <a class="btn gradient-bg" href="{{ route('event.detail', $event->id) }}">Nhận vé</a>
                                    </div><!-- .entry-footer" -->
                                </div><!-- .col -->
                            </div><!-- .container -->
                        </div><!-- .hero-content -->
                    </div><!-- .swiper-slide -->
                </div><!-- .swiper-wrapper -->
            @endforeach
        </div>

        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Add Arrows -->
        <div class="swiper-button-next flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
        </div>

        <div class="swiper-button-prev flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
        </div>
    </div>

    <div class="homepage-featured-events">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="featured-events-wrap flex flex-wrap justify-content-between">
                        <div class="event-content-wrap positioning-event-1">
                            <figure>
                                <a href="#"><img src="{{ asset('frontend/images/1.jpg')}}" alt="1"></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">Michael Smith in concert</h3>

                                <div class="posted-date">August 25</div>
                            </header>
                        </div>

                        <div class="event-content-wrap positioning-event-2">
                            <figure>
                                <a href="#"><img src="{{ asset('frontend/images/2.jpg')}}" alt=""></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">Street art fest</h3>

                                <div class="posted-date">November 28</div>
                            </header>
                        </div>

                        <div class="event-content-wrap positioning-event-3">
                            <figure>
                                <a href="#"><img src="{{ asset('frontend/images/3.jpg')}}" alt=""></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">Anabelle in concert</h3>

                                <div class="posted-date">August 28</div>
                            </header>
                        </div>

                        <div class="event-content-wrap positioning-event-4 half">
                            <figure>
                                <a href="#"><img src="{{ asset('frontend/images/events-in-london.jpg')}}" alt=""></a>
                            </figure>
                        </div>

                        <div class="event-content-wrap positioning-event-5 half">
                            <figure>
                                <a href="#"><img src="{{ asset('frontend/images/check-july.png')}}" alt=""></a>
                            </figure>
                        </div>

                        <div class="event-content-wrap positioning-event-6 half">
                            <figure>
                                <a href="#"><img src="{{ asset('frontend/images/summer-festivals.jpg')}}" alt=""></a>
                            </figure>
                        </div>

                        <div class="event-content-wrap positioning-event-7">
                            <figure>
                                <a href="#"><img src="{{ asset('frontend/images/90.jpg')}}" alt=""></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">90’s Disco Night</h3>

                                <div class="posted-date">August 28</div>
                            </header>
                        </div>

                        <div class="event-content-wrap positioning-event-8">
                            <figure>
                                <a href="#"><img src="{{ asset('frontend/images/modern.jpg')}}" alt="1"></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">Modern Ballet</h3>

                                <div class="posted-date">August 25</div>
                            </header>
                        </div>

                        <div class="event-content-wrap positioning-event-9">
                            <figure>
                                <a href="#"><img src="{{ asset('frontend/images/smoke.jpg')}}" alt=""></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">Smoke show</h3>

                                <div class="posted-date">August 28</div>
                            </header>
                        </div>

                        <div class="event-content-wrap positioning-event-10 half">
                            <figure>
                                <a href="#"><img src="{{ asset('frontend/images/summer-festival.jpg')}}" alt=""></a>
                            </figure>
                        </div>

                        <div class="event-content-wrap positioning-event-11 half">
                            <figure>
                                <a href="#"><img src="{{ asset('frontend/images/autumn.jpg')}}" alt=""></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="homepage-next-events">
        <div class="container">
            <div class="row">
                <div class="next-events-section-header">
                    <h2 class="entry-title">Our next events</h2>
                    <p>Vestibulum eget lacus at mauris sagittis varius. Etiam ut venenatis dui. Nullam tellus risus, pellentesque at facilisis et, scelerisque sit amet metus. Duis vel semper turpis, ac tempus libero. Maecenas id ultrices risus. Aenean nec ornare ipsum, lacinia.</p>
                </div>
            </div>
            <div id="app">
                <sub-event
                        sub-events="{{ json_encode($subEvents) }}"
                        all-type="{{ json_encode(\App\Models\Type::pluck('name', 'id')->toArray()) }}"
                        url-sub="{{ route('event.sub')  }}"
                        url-detail="{{ route('event.detail', 999) }}"
                ></sub-event>
            </div>
            <script src="/js/app.js"></script>
        </div>
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

@section('inline_script')
    <script src="{{ asset('frontend/js/custom.js')}}"></script>
@endsection
