@extends('layouts.frontend.app')

@section('title', 'Agenda| Sự kiện của tôi')

@section('background_header')
    <div class="page-header events-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Sự kiện của tôi.</h1>
                    </header>
                </div>
            </div>
        </div>
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
            @can('enterprise')
                <h4 class="entry-title">Sự kiện chính</h4>
                <div class="row">
                    @foreach($user->mainEvent as $key => $event)
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="next-event-wrap">
                                <figure>
                                    <a href="{{ route('event.review', $event->id) }}"><img src="{{ asset($event->avatar) }}" alt="1"></a>
                                </figure>

                                <header class="entry-header">
                                    <h3 class="entry-title">{{ $event->name }}</h3>

                                    <div class="posted-date">{{ date("l", strtotime($event->start_date)) }}<span>{{ $event->start_date }}</span></div>
                                </header>

                                <div class="entry-content">
                                    <p>{{ $event->title }}</p>
                                </div>
                                @can('buyer')
                                    <footer class="entry-footer">
                                        <a href="{{ route('event.resend', $event->id) }}">Nhận lại vé</a>
                                    </footer>
                                @endcan
                            </div>
                        </div>
                    @endforeach
                </div>
                <h4 class="entry-title">Sự kiện liên kết</h4>
            @endcan
            <div class="row">
                @foreach($user->events as $key => $event)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="next-event-wrap">
                            <figure>
                                <a href="{{ route('event.detail', $event->id) }}"><img src="{{ asset($event->avatar) }}" alt="1"></a>
                            </figure>

                            <header class="entry-header">
                                <h3 class="entry-title">{{ $event->name }}</h3>

                                <div class="posted-date">{{ date("l", strtotime($event->start_date)) }}<span>{{ $event->start_date }}</span></div>
                            </header>

                            <div class="entry-content">
                                <p>{{ $event->title }}</p>
                            </div>
                            @can('buyer')
                                <footer class="entry-footer">
                                    <a href="{{ route('event.resend', $event->id) }}">Nhận lại vé</a>
                                </footer>
                            @endcan
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
