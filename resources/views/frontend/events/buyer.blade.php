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

    <div class="homepage-next-events mb-5">
        <div class="container">
            <div class="text-center">
                <div class="next-events-section-header">
                    <h2 class="entry-title">Sự kiện của tôi</h2>
                    <p>Đây là sự kiện mà bạn đang tham gia.</p>
                </div>
            </div>
            <div class="row">
                @foreach($buyer->events as $key => $event)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="next-event-wrap">
                            <figure>
                                <a href="#"><img src="{{ asset($event->avatar) }}" alt="1"></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">{{ $event->name }}</h3>

                                <div class="posted-date">{{ date("l", strtotime($event->start_date)) }}<span>{{ $event->start_date }}</span></div>
                            </header>

                            <div class="entry-content">
                                <p>{{ $event->title }}</p>
                            </div>

                            <footer class="entry-footer">
                                <a href="{{ route('event.resend', $event->id) }}">Nhận lại vé</a>
                            </footer>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('inline_script')
    <script src="{{ asset('frontend/js/custom.js')}}"></script>
@endsection
