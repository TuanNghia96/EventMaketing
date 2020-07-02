@extends('layouts.frontend.app')

@section('title', 'Agenda| Sự kiện ' . $event->name)

@section('background_header')
    <div class="page-header single-event-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">{{ $event->name }}</h1>
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
                                <a class="btn gradient-bg" href="{{ route('login') }}">Đăng nhập để nhận vé</a>
                            @else
                                @can('buyer')
                                    @if(($event->start_date <= now()))
                                        <button class="btn btn-default">Sự kiện chưa bắt đầu</button>
                                    @else
                                        <a class="btn gradient-bg" @if($event->ticket_number <= $event->buyer->count()) disabled @endif href="{{ route('event.join', $event->id) }}">Nhận vé</a>
                                    @endif
                                @endcan
                                @can('supplier')
                                    @if($event->mainSupplier()->find(\Auth::user()->user->id) && !$event->isPublic())
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                            <span class="btn-label">
                                                <i class="fa fa-times"></i>
                                            </span>Yêu cầu hủy bỏ
                                        </button>
                                    @elseif($event->suppliers->find(\Auth::user()->user->id) || $event->mainSupplier->find(\Auth::user()->user->id))
                                        <a class="btn gradient-bg" readonly>Đã tham gia sự kiện</a>
                                    @elseif(($event->status != \App\Models\Event::VALIDATED) || ($event->public_date < now()))
                                        <button class="btn btn-default">Sự kiện đã bắt đầu</button>
                                    @else
                                        <a class="btn gradient-bg" href="{{ route('event.connect', $event->id) }}">Tham gia sự kiện</a>
                                    @endif
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
        
        {{--hidden modal--}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('event.delete') }}" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nhập lý do</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="id" value="{{ $event->id }}">
                            <label for="">Lý do</label>
                            <input type="text" class="form-control" name="note" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Hủy bỏ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="tabs">
                    <ul class="tabs-nav flex">
                        <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_details">Tiêu điểm</li>
                        <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_venue">Nội dung</li>
                        <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_organizers">Nhà cung cấp</li>
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
                                    
                                    <div class="single-event-details-row">
                                        <label>Số lượng vé:</label>
                                        <p>{{ $event->ticket_number }}</p>
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
                            <p>{!! $event->summary !!}</p>
                            <br>
                            <h5>Hình ảnh của sự kiện:</h5>
                            <div class="row">
                                @isset($event->images)
                                    @foreach($event->images as $key => $value)
                                        <div class="column">
                                            <img src="{{ asset($value->image) }}" alt="Snow" style="width:100%">
                                            
                                            <label for="">{{ $value->title }}</label>
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                        <div id="tab_organizers" class="tab-images">
                            <h3>Nhà cung cấp chủ quản</h3>
                            <div class="col-md-12 row">
                                @foreach($event->mainSupplier as $key => $supplier)
                                    <div class="col text-center">
                                        <figure class="events-thumbnail">
                                            <a href="#"><img id="{{ 'logo' . $key }}" src="{{ asset($supplier->avatar) }}" class="logo" alt=""></a>
                                        </figure>
                                        <span><b>{{ $supplier->name }}</b></span><br>
                                        <span>{{ $supplier->address }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <br>
                            <h3>Nhà cung cấp tham gia liên kết</h3>
                            <div class="col-md-12 row">
                                @foreach($event->suppliers as $key => $supplier)
                                    <div class="col text-center">
                                        <figure class="events-thumbnail">
                                            <a href="#"><img id="{{ 'logo' . $key }}" src="{{ asset($supplier->avatar) }}" class="logo" alt=""></a>
                                        </figure>
                                        <span><b>{{ $supplier->name }}</b></span><br>
                                        <span>{{ $supplier->address }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="app">
            <rating-event
                    event="{{ json_encode($event) }}"
                    comments="{{ json_encode($event->comments) }}"
                    post-url="{{ route('event.postComment') }}"
                    csrf-token="{{ csrf_token() }}"
                    @can('buyer')
                    is-joined="{{ \App\Models\Ticket::where('buyer_id', \Auth::user()->user->id)->where('event_id', $event->id)->get()->toArray() ? true : false }}"
                    @endcan
            >
            </rating-event>
        </div>
        <script src="/js/app.js"></script>
    </div>
@endsection

@section('inline_css')
    <style>
        :root {
            --bannerFontSize: #logo0 . with;
        }
        
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
        
        img.logo {
            object-fit: cover;
            width: 180px;
            height: 180px;
            border-radius: 50%;
        }
    </style>
@endsection

@section('inline_script')
    <script type='text/javascript' src="{{ asset('frontend/js/custom.js') }}"></script>
@endsection
