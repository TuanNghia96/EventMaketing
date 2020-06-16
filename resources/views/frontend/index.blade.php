@extends('layouts.frontend.app')

@section('title', 'Agenda| Trang chủ')

@section('background_header')
    <div class="swiper-slide" data-date="2020/10/01" style="background: url('{{ asset('frontend/images/header-bg.jpg')}}') no-repeat">
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div class="col flex flex-column justify-content-center">
                        <div class="entry-header">
                            <div class="countdown flex align-items-center">
                                <h1 class="text-center text-white"><label>AGENDA</label></h1>
                            </div><!-- .countdown -->

                            <h2 class="entry-title text-white">Chúng tôi có những sự kiện tuyệt vời. <br>Hãy xem ngay!</h2>
                        </div><!--- .entry-header -->

                        <div class="entry-footer">
                            {{--<a class="btn gradient-bg" href="#">Order here</a>--}}
                        </div><!-- .entry-footer" -->
                    </div><!-- .col -->
                </div><!-- .container -->
            </div><!-- .hero-content -->
        </div><!-- .swiper-slide -->
    </div><!-- .swiper-wrapper -->

@endsection

@section('content')
    @include('layouts.frontend.introduce')
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
                                <a href="{{ route('event.news') }}"><img src="{{ asset('frontend/images/1.jpg')}}" alt="1"></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">Michael Smith in concert</h3>

                                <div class="posted-date">August 25</div>
                            </header>
                        </div>

                        <div class="event-content-wrap positioning-event-2">
                            <figure>
                                <a href="{{ route('event.news') }}"><img src="{{ asset('frontend/images/2.jpg')}}" alt=""></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">Street art fest</h3>

                                <div class="posted-date">November 28</div>
                            </header>
                        </div>

                        <div class="event-content-wrap positioning-event-3">
                            <figure>
                                <a href="{{ route('event.news') }}"><img src="{{ asset('frontend/images/3.jpg')}}" alt=""></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">Anabelle in concert</h3>

                                <div class="posted-date">August 28</div>
                            </header>
                        </div>

                        <div class="event-content-wrap positioning-event-4 half">
                            <figure>
                                <a href="{{ route('event.news') }}"><img src="{{ asset('frontend/images/events-in-london.jpg')}}" alt=""></a>
                            </figure>
                        </div>

                        <div class="event-content-wrap positioning-event-5 half">
                            <figure>
                                <a href="{{ route('event.news') }}"><img src="{{ asset('frontend/images/check-july.png')}}" alt=""></a>
                            </figure>
                        </div>

                        <div class="event-content-wrap positioning-event-6 half">
                            <figure>
                                <a href="{{ route('event.news') }}"><img src="{{ asset('frontend/images/summer-festivals.jpg')}}" alt=""></a>
                            </figure>
                        </div>

                        <div class="event-content-wrap positioning-event-7">
                            <figure>
                                <a href="{{ route('event.news') }}"><img src="{{ asset('frontend/images/90.jpg')}}" alt=""></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">90’s Disco Night</h3>

                                <div class="posted-date">August 28</div>
                            </header>
                        </div>

                        <div class="event-content-wrap positioning-event-8">
                            <figure>
                                <a href="{{ route('event.news') }}"><img src="{{ asset('frontend/images/modern.jpg')}}" alt="1"></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">Modern Ballet</h3>

                                <div class="posted-date">August 25</div>
                            </header>
                        </div>

                        <div class="event-content-wrap positioning-event-9">
                            <figure>
                                <a href="{{ route('event.news') }}"><img src="{{ asset('frontend/images/smoke.jpg')}}" alt=""></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">Smoke show</h3>

                                <div class="posted-date">August 28</div>
                            </header>
                        </div>

                        <div class="event-content-wrap positioning-event-10 half">
                            <figure>
                                <a href="{{ route('event.news') }}"><img src="{{ asset('frontend/images/summer-festival.jpg')}}" alt=""></a>
                            </figure>
                        </div>

                        <div class="event-content-wrap positioning-event-11 half">
                            <figure>
                                <a href="{{ route('event.news') }}"><img src="{{ asset('frontend/images/autumn.jpg')}}" alt=""></a>
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
                    <h2 class="entry-title">Sự kiện tiếp theo</h2>
                    <p>Không tìm thấy sự kiện mong muốn. Đừng lo, chúng tôi còn rất nhiều sự kiện khác mà bạn có thể quan tâm. Hãy tham gia vào hệ thống của chúng tôi để có những trải nghiệm thật tuyệt vời.</p>
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
@endsection

@section('inline_script')
    <script src="{{ asset('frontend/js/custom.js')}}"></script>
@endsection
