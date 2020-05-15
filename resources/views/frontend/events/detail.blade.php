@extends('layouts.frontend.app')

@section('content')
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{ asset($event->avatar) }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1 style="font-size: 80px;">{{ $event->name }}</h1>
                            @if($event->start_date > now())
                                <h2>Thời gian bắt đầu sự kiện còn:</h2>
                                <input type="hidden" value="{{ $event->start_date }}" id="countDate">
                            @else
                                <h2>Thời gian kết thúc sự kiện còn:</h2>
                                <input type="hidden" value="{{ $event->end_date }}" id="countDate">
                            @endif
                            <div class="simply-countdown simply-countdown-one"></div>
                            <p><a href="#" class="btn btn-default btn-sm">Tham gia</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="fh5co-services" class="fh5co-section-gray">
        <div class="container">

            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>{{ $event->title }}</h2>
                    <p>{{ $event->summary }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-calendar"></i>
						</span>
                        <div class="feature-copy">
                            <h3>Thời gian công bố:</h3>
                            @if($event->public_date > now())
                                <p>{{  date('H:i d/m/Y', strtotime($event->public_date)) }}</p>
                            @else
                                <p>Sự kiện đã được công bố</p>
                            @endif
                        </div>
                    </div>
                    <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-calendar"></i>
						</span>
                        <div class="feature-copy">
                            <h3>Thời gian Bắt đầu:</h3>
                            @if($event->public_date > now())
                                <p>{{  date('H:i d/m/Y', strtotime($event->start_date)) }}</p>
                            @else
                                <p>Sự kiện đã được công bố</p>
                            @endif
                        </div>
                    </div>
                    <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-calendar"></i>
						</span>
                        <div class="feature-copy">
                            <h3>Thời gian kết thúc:</h3>
                            <p>{{  date('H:i d/m/Y', strtotime($event->end_date)) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animate-box">
                    <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-location-2"></i>
						</span>
                        <div class="feature-copy">
                            <h3>Location</h3>
                            <p>{{ $event->location }}</p>
                        </div>
                    </div>
                    <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-heart-outlined"></i>
						</span>
                        <div class="feature-copy">
                            <h3>classcify</h3>
                            <p>{{ \App\Models\Event::$classify[$event->classify] }}</p>
                        </div>
                    </div>
                    <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-game-controller"></i>
						</span>
                        <div class="feature-copy">
                            <h3>type</h3>
                            <p>{{ \App\Models\Event::TYPE[$event->type] }}</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    {{--<div id="fh5co-couple">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>Hello!</h2>
                    <p>{{ $event->summary }}</p>
                </div>
            </div>
        </div>
    </div>--}}
    @isset($event->images)

        <div id="fh5co-couple-story">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                        <h2>Our Image</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-md-offset-0">
                        <ul class="timeline animate-box">
                            @foreach($event->images as $key => $value)
                                <li class="@if($key%2) timeline-inverted @endif animate-box">
                                    {{--<div class="timeline-badge" style="background-image:url(images/couple-1.jpg);"></div>--}}
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h3 class="timeline-title">{{ $key }}. {{ $value->title }}</h3>
                                        </div>
                                        <div class="timeline-body img_box">
                                            <img src="{{ $value->image }}" width="100%" height="auto" alt="" sizes="" srcset="">
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endisset
    <div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url({{ asset('frontend/images/img_bg_5.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="display-t">
                    <div class="display-tc">
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-left">
								<span class="icon">
									<i class="icon-users"></i>
								</span>
                                <span class="counter-label">Thành viên</span>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-left">
								<span class="icon">
									<i class="icon-user"></i>
								</span>
                                <span class="counter-label">Đối tác</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-left">
								<span class="icon">
									<i class="icon-calendar"></i>
								</span>
                                <span class="counter-label">Sự kiện hoàn thành</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-left">
								<span class="icon">
									<i class="icon-clock"></i>
								</span>
                                <span class="counter-label">Hours Spent</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-left">
								<span class="icon">
									<i class="icon-users"></i>
								</span>
                                <span class="counter-label">Thành viên</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-left">
								<span class="icon">
									<i class="icon-user"></i>
								</span>
                                <span class="counter-label">Đối tác</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-left">
								<span class="icon">
									<i class="icon-calendar"></i>
								</span>
                                <span class="counter-label">Sự kiện hoàn thành</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-left">
								<span class="icon">
									<i class="icon-clock"></i>
								</span>
                                <span class="counter-label">Hours Spent</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_script')

    <script>
        var d = new Date($('#countDate').val());
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
        $('#eventHeader').addClass('active');

        var img = $('.img_box').firstChild;
        img.onload = function () {
            if (img.height > img.width) {
                img.height = '100%';
                img.width = 'auto';
            }
        };
    </script>
@endsection
