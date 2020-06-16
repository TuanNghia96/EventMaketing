@extends('layouts.backend.admin')

@section('title', 'Chi tiết sự kiện')

@section('content')
    <div class="card-header">
        <div class="card-title">Event detail</div>
    </div>
    <div class="card-body">
        <table class="table table-typo">
            <tbody>
            <tr>
                <td>
                    <p>id</p>
                </td>
                <td><p>{{ $event->id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>name</p>
                </td>
                <td><p>{{ $event->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>title</p>
                </td>
                <td><p>{{ $event->title }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>code</p>
                </td>
                <td><p>{{ $event->code }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>location</p>
                </td>
                <td><p>{{ $event->location }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>summary</p>
                </td>
                <td><p>{!! $event->summary !!}</p></td>
            </tr>
            <tr>
                <td>
                    <p>avatar</p>
                </td>
                <td><img src="{{ asset($event->avatar) }}" alt="" width="50%"></td>
            </tr>
            <tr>
                <td>
                    <p>Thời gian công bố</p>
                </td>
                <td><p>{{ $event->public_date }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Thời gian bắt đầu</p>
                </td>
                <td><p>{{ $event->start_date }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Thời gian kết thúc</p>
                </td>
                <td><p>{{ $event->end_date }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Coupon</p>
                </td>
                <td><p>{{ $event->coupon_id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Điểm</p>
                </td>
                <td><p>{{ $event->point }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Thể loại</p>
                </td>
                <td><p>{{ $event->type->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Danh mục</p>
                </td>
                <td><p>{{ $event->category->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tình trạng</p>
                </td>
                <td><p>{{ $event->status }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Hình ảnh</p>
                </td>
                <td>
                    <table class="table table-typo">
                        <tbody>
                        @foreach($event->images as $image)
                                <td>
                                    {{ $image->title }}
                                </td>
                                <td>
                                    <img src="{{ asset($image->image) }}" alt="" width="50%">
                                </td>
                        @endforeach
                        </tbody>
                    </table>
                </td>
            
            </tr>
            <tr>
                <td>
                    <p>Vé</p>
                </td>
                <td><p>{{ $event->ticket_number }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Đánh giá trung bình</p>
                </td>
                <td>
                    <div class="col-md-6">
                        <div class="demo">
                            <div class="progress-card">
                                <div class="progress-status">
                                    {{--<span class="text-muted">Open Rate</span>--}}
                                    <span class="text-muted fw-bold"> {{ $event->rating * 20 }}%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: {{ $event->rating * 20 }}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="60%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Chủ doanh nghiệp</p>
                </td>
                <td>
                    @foreach($event->mainEnp->pluck('name', 'id')->toArray() as $key => $value)
                        <a href="{{ route('enterprises.show', $key) }}">{{ $value }}</a>&nbsp;&nbsp;&nbsp;
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    <p>Các doanh nghiệp</p>
                </td>
                <td>
                    @foreach($event->enterprises->pluck('name', 'id')->toArray() as $key => $value)
                        <a href="{{ route('enterprises.show', $key) }}">{{ $value }}</a>&nbsp;&nbsp;&nbsp;
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    <p>Trạng thái</p>
                </td>
                <td>{{ $statuses[$event->status] }}</td>
            </tr>
            <tr>
                <td>
                    <p>Hành động</p>
                </td>
                <td>
                    @if($event->status == \App\Models\Event::$status[0])
                        <a class="btn btn-danger" href="{{ route('events.cancel', $event->id) }}">
                            <span class="btn-label">
                                <i class="fa fa-times"></i>
                            </span>Cancel
                        </a>
                        <a class="btn btn-success" href="{{ route('events.success', $event->id) }}">
                            <span class="btn-label">
                                <i class="fa fa-check"></i>
                            </span>Success
                        </a>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
