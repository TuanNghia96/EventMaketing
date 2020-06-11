@extends('layouts.backend.admin')

@section('title', 'Chi tiết người dùng')

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
                <td><p>{{ $user->id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>name</p>
                </td>
                <td><p>{{ $user->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>title</p>
                </td>
                <td><p>{{ $user->title }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>code</p>
                </td>
                <td><p>{{ $user->code }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>location</p>
                </td>
                <td><p>{{ $user->location }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>summary</p>
                </td>
                <td><p>{{ $user->summary }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>avatar</p>
                </td>
                <td><img src="{{ asset($user->avatar) }}" alt="" width="50%"></td>
            </tr>
            <tr>
                <td>
                    <p>Thời gian công bố</p>
                </td>
                <td><p>{{ $user->public_date }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Thời gian bắt đầu</p>
                </td>
                <td><p>{{ $user->start_date }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Thời gian kết thúc</p>
                </td>
                <td><p>{{ $user->end_date }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Coupon</p>
                </td>
                <td><p>{{ $user->coupon_id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Điểm</p>
                </td>
                <td><p>{{ $user->point }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Thể loại</p>
                </td>
                <td><p>{{ $user->type->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Danh mục</p>
                </td>
                <td><p>{{ $user->category->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tình trạng</p>
                </td>
                <td><p>{{ $user->status }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Hình ảnh</p>
                </td>
                <td><p>{{ $user->images }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Vé</p>
                </td>
                <td><p>{{ $user->ticket_number }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tên doanh nghiệp</p>
                </td>
                <td>
                    @foreach($user->enterprises()->get()->pluck('name', 'id')->toArray() as $key => $value)
                        <a href="{{ route('enterprises.show', $key) }}"><p>{{ $value }}</p></a>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    <p>Hành động</p>
                </td>
                <td>
                    @if($user->public_date < now())
                        <a class="btn btn-danger" href="{{ route('events.cancel', $user->id) }}">
                            <span class="btn-label">
                                <i class="fa fa-times"></i>
                            </span>Cancel
                        </a>
                    @endif
                    @if($user->status == \App\Models\Event::$status[0])
                        <a class="btn btn-success" href="{{ route('events.success', $user->id) }}">
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