@extends('layouts.frontend.app')

@section('content')
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{ asset('frontend/images/img_bg_2.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Event Countdown</h1>
                            <h2>Let join your event</h2>
                            <div class="simply-countdown simply-countdown-one"></div>
                            <p><a href="#" class="btn btn-default btn-sm">Save the date</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="fh5co-couple">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>Hello!</h2>
                    <h3 id="time"></h3>
                    <p>Đây là những sự kiện có thể bạn quan tâm</p>
                </div>
            </div>
        </div>
    </div>
    @foreach($events as $key => $event)
        <div id="fh5co-event" class="fh5co-bg" style="background-image:url({{ asset($event->image) }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                        <h2>{{ $event->name }}</h2>
                        <span>{{ \App\Models\Event::$type[$event->type] }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="col-md-6 col-sm-6 text-center">
                                    <div class="event-wrap animate-box">
                                        <h3>Thông tin</h3>
                                        <div class="event-col">
                                            <i class="icon-calendar"></i>
                                            <span>Bắt đầu</span>
                                            <span>Kết thúc</span>
                                        </div>
                                        <div class="event-col">
                                            <i class="icon-clock"></i>
                                            <span>{{ date('H:i d-m', strtotime($event->start_date)) }}</span>
                                            <span>{{ date('H:i d-m', strtotime($event->end_date)) }}</span>
                                        </div>
                                        <p>{{ $event->summary }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 text-center">
                                    <div class="event-wrap animate-box">
                                        <h3>Sự kiện chính</h3>
                                        <div class="event-col">
                                            <i class="icon-home"></i>
                                            <span>{{ $event->location }}</span>
                                        </div>
                                        <div class="event-col">
                                            <i class="icon-flag"></i>
                                            <span>{{ \App\Models\Event::$type[$event->type] }}</span>
                                        </div>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 text-center">
                                    <p><a href="{{ route('event.detail', $event->id) }}" class="btn btn-default btn-sm" style="margin-top: 3%;">Tham gia</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection

@section('inline_script')

    <script>
        var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

        // default example
        simplyCountdown('.simply-countdown-one', {
            year: d.getFullYear(),
            month: d.getMonth() + 1,
            day: d.getDate()
        });
        var timestamp = new Date().getTime();

        function updateTime() {
            // $('#time').html(Date(moment(timestamp, 'H:i:s d-m-Y')));
            $('#time').html(Date(timestamp));
            timestamp++;
        }

        $(function () {
            setInterval(updateTime, 1000);
        });

        //jQuery example
        $('#simply-countdown-losange').simplyCountdown({
            year: d.getFullYear(),
            month: d.getMonth() + 1,
            day: d.getDate(),
            enableUtc: false
        });

        $('.header_button').removeClass('active');
        $('#homeHeader').addClass('active');
    </script>
@endsection
