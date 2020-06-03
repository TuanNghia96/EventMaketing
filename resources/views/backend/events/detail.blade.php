@extends('layouts.backend.admin')

@section('title', 'Chi tiết sự kiện')

@section('content')
    <div class="card-header">
        <div class="card-title">Event detail</div>
        {{--<div class="card-category">Card Category</div>--}}
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
                <td><p>{{ $event->summary }}</p></td>
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
                    <p>Voucher</p>
                </td>
                <td><p>{{ $event->voucher_id }}</p></td>
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
                <td><p>{{ $event->images }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Vé</p>
                </td>
                <td><p>{{ $event->ticket_number }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tên doanh nghiệp</p>
                </td>
                <td>
                    @foreach($event->enterprises()->get()->pluck('name', 'id')->toArray() as $key => $value)
                        <a href="{{ route('enterprises.show', $key) }}"><p>{{ $value }}</p></a>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    <p>Hành động</p>
                </td>
                <td>
                    @if($event->public_date < now())
                        <a class="btn btn-danger" href="{{ route('events.remove', $event->id) }}">
                            <span class="btn-label">
                                <i class="fa fa-times"></i>
                            </span>Remove
                        </a>
                    @endif
                    @if($event->status == \App\Models\Event::$status[0])
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

@section('inline_scripts')
@endsection