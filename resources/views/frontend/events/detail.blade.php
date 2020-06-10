@extends('layouts.frontend.app')

@section('title', 'Agenda| Sự kiện ' . $event->name)

@section('background_header')
    <div class="page-header single-event-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Summer Festival.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 single-event">
                <div class="event-content-wrap">
                    <header class="entry-header flex flex-wrap justify-content-between align-items-end">
                        <div class="single-event-heading">
                            <h2 class="entry-title">{{ $event->name }}</h2>

                            <div class="event-location">{{ $event->location }}</div>

                            <div class="event-date">{{ date('M d, Y @ h:i A', strtotime($event->start_date)) . ' - ' . date('M d, Y @ h:i A', strtotime($event->end_date)) }}</div>
                        </div>

                        <div class="buy-tickets flex justify-content-center align-items-center">
                            @if(!Auth::check())
                                <a class="btn gradient-bg" href="{{ route('login') }}">Login to get ticket</a>
                            @else
                                @can('buyer')
                                    <a class="btn gradient-bg" @if($event->ticket_number <= $event->buyer->count()) disabled @endif href="{{ route('event.join', $event->id) }}">Get Tikets</a>
                                @endcan
                            @endif
                        </div>
                    </header>
                    <br>
                    <figure class="events-thumbnail">
                        <img src="{{ asset($event->avatar) }}" id="event_thumbnail" alt="">
                    </figure>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="tabs">
                    <ul class="tabs-nav flex">
                        <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_details">Summary</li>
                        <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_venue">Detail</li>
                        <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_organizers">Images</li>
                    </ul>

                    <div class="tabs-container">
                        <div id="tab_details" class="tab-content">
                            <div class="flex flex-wrap justify-content-between">
                                <div class="single-event-details">
                                    <div class="single-event-details-row">
                                        <label>Thời gian bắt đầu:</label>
                                        <p>{{ date('M d, Y @ h:i A', strtotime($event->start_date)) }}</p>
                                    </div>

                                    <div class="single-event-details-row">
                                        <label>Thời gian kết thúc:</label>
                                        <p>{{ date('M d, Y @ h:i A', strtotime($event->end_date)) }}</p>
                                    </div>

                                    <div class="single-event-details-row">
                                        <label>Mã giảm giá:</label>
                                        <p><span>{{ $event->coupon->value . '%' }}</span></p>
                                    </div>

                                    <div class="single-event-details-row">
                                        <label>Thể loại</label>
                                        <p>{{ $event->type->name }}</p>
                                    </div>

                                    <div class="single-event-details-row">
                                        <label>Danh mục:</label>
                                        <p>{{ $event->category->name }}</p>
                                    </div>

                                    <div class="single-event-details-row">
                                        <label>Địa điểm:</label>
                                        <p>{{ $event->location }}</p>
                                    </div>

                                </div>

                                <div class="single-event-map">
                                    @php($location = str_replace(' ', '+', $event->location))
                                    <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=
                                            {{ $location }}
                                            &t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div>
                        </div>

                        <div id="tab_venue" class="tab-content">
                            <h5>Nội dung:</h5>
                            <p>{{ $event->summary }}</p>
                            <br>
                            <h5>Hình ảnh của sự kiện:</h5>
                            <div class="row">
                                @isset($event->images)
                                    @foreach($event->images as $key => $value)
                                        <div class="column">
                                            <img src="{{ $value->image }}" alt="Snow" style="width:100%">
                                            <label for="">{{ $value->title }}</label>
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>

                        <div id="tab_organizers" class="tab-images">

                        </div>
                    </div>
                </div>
            </div>
        </div>

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

@section('inline_css')
    <style>
        * {
            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 33.33%;
            padding: 5px;
        }

        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        a.disabled {
            pointer-events: none;
            color: #ccc;
        }

        #event_thumbnail {
            width: 100%;
            height: auto
        }
    </style>
@endsection

@section('inline_script')
    <script type='text/javascript' src="{{ asset('frontend/js/custom.js') }}"></script>
@endsection
