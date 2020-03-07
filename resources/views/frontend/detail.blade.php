@extends('layouts.frontend.app')

@section('content')
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{ asset($event->image) }});" data-stellar-background-ratio="0.5">
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
    {{--@foreach($events as $key => $event)
        --}}{{--<div id="fh5co-event" class="fh5co-bg" style="background-image:url({{ asset('frontend/images/img_bg_3.jpg') }});">--}}{{--
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
                                    <p><a href="#" class="btn btn-default btn-sm" style="margin-top: 3%;">Tham gia</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach--}}

    <div id="fh5co-gallery" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <span>Our Memories</span>
                    <h2>Wedding Gallery</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>
            {{--<div class="row row-bottom-padded-md">
                <div class="col-md-12">
                    <ul id="fh5co-gallery-list">
                        @foreach($subEvents as $key => $event)
                            <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset($event->image) }}); ">
                                <a href="{{ asset($event->image) }}">
                                    <div class="case-studies-summary">
                                        <span>{{ \App\Models\Event::$type[$event->type] }}</span>
                                        <h2>{{ $event->name }}</h2>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>--}}
        </div>
    </div>

    {{--<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url({{ asset('frontend/images/img_bg_5.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="display-t">
                    <div class="display-tc">
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-center">
								<span class="icon">
									<i class="icon-users"></i>
								</span>
                                
                                <span class="counter js-counter" data-from="0" data-to="{{ $webInfo['buyer'] }}" data-speed="5000" data-refresh-interval="50">1</span>
                                <span class="counter-label">Thành viên</span>
                            
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-center">
								<span class="icon">
									<i class="icon-user"></i>
								</span>
                                
                                <span class="counter js-counter" data-from="0" data-to="{{ $webInfo['enterprise'] }}" data-speed="5000" data-refresh-interval="50">1</span>
                                <span class="counter-label">Đối tác</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-center">
								<span class="icon">
									<i class="icon-calendar"></i>
								</span>
                                <span class="counter js-counter" data-from="0" data-to="{{ $webInfo['event'] }}" data-speed="5000" data-refresh-interval="50">1</span>
                                <span class="counter-label">Sự kiện hoàn thành</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 animate-box">
                            <div class="feature-center">
								<span class="icon">
									<i class="icon-clock"></i>
								</span>
                                
                                <span class="counter js-counter" data-from="0" data-to="2345" data-speed="5000" data-refresh-interval="50">1</span>
                                <span class="counter-label">Hours Spent</span>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}

    <div id="fh5co-testimonial">
        <div class="container">
            <div class="row">
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <span>Best Wishes</span>
                        <h2>Friends Wishes</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 animate-box">
                        <div class="wrap-testimony">
                            <div class="owl-carousel-fullwidth">
                                <div class="item">
                                    <div class="testimony-slide active text-center">
                                        <figure>
                                            <img src="{{ asset('frontend/images/couple-1.jpg') }}" alt="user">
                                        </figure>
                                        <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                        <blockquote>
                                            <p>"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics"</p>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-slide active text-center">
                                        <figure>
                                            <img src="{{ asset('frontend/images/couple-2.jpg') }}" alt="user">
                                        </figure>
                                        <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                        <blockquote>
                                            <p>"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, at the coast of the Semantics, a large language ocean."</p>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-slide active text-center">
                                        <figure>
                                            <img src="{{ asset('frontend/images/couple-3.jpg') }}" alt="user">
                                        </figure>
                                        <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                        <blockquote>
                                            <p>"Far far away, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean."</p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-services" class="fh5co-section-gray">
        <div class="container">

            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>We Offer Services</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-calendar"></i>
						</span>
                        <div class="feature-copy">
                            <h3>We Organized Events</h3>
                            <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                        </div>
                    </div>

                    <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-image"></i>
						</span>
                        <div class="feature-copy">
                            <h3>Photoshoot</h3>
                            <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                        </div>
                    </div>

                    <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-video"></i>
						</span>
                        <div class="feature-copy">
                            <h3>Video Editing</h3>
                            <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 animate-box">
                    <div class="fh5co-video fh5co-bg" style="background-image: url({{ asset('frontend/images/img_bg_3.jpg') }}); ">
                        <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video2"></i></a>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>


        </div>
    </div>


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
    </script>
@endsection
