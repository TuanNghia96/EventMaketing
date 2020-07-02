@extends('layouts.backend.admin')

@section('title', 'Chi tiết người mua')

@section('content')
    <div class="card-header row">
        <div class="card-title col">Chi tiết người mua</div>
        <div class="col text-right">
            @if($user->status)
                <a class="btn btn-danger" href="{{ route('buyers.delete', $user->id) }}">Khóa tài khoản</a>
            @else
                <a class="btn btn-success" href="{{ route('buyers.restore', $user->id) }}">Phục hồi tài khoản</a>
            @endif
        </div>
    </div>
    <div class="card-body">
        <table class="table table-typo">
            <tbody>
            <tr>
                <td>
                    <p>id</p>
                </td>
                <td><p>{{ $user->user_id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>email</p>
                </td>
                <td><p>{{ $user->user->email }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Mã số</p>
                </td>
                <td><p>{{ $user->buyer_code }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tên</p>
                </td>
                <td><p>{{ $user->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Địa chỉ</p>
                </td>
                <td><p>{{ $user->address }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Ảnh đại diện</p>
                </td>
                <td><img class="avatar" height="200%" src="{{ asset($user->avatar) }}" alt=""></td>
            </tr>
            <tr>
                <td>
                    <p>Số điện thoại</p>
                </td>
                <td><p>{{ $user->phone }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tk ngân hàng</p>
                </td>
                <td><p>{{ $user->bank_account }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Sdt</p>
                </td>
                <td><p>{{ $user->phone }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Trạng thái</p>
                </td>
                <td>
                    @if($user->status)
                        <span class="badge badge-success">Hoạt động</span>
                    @else
                        <span class="badge badge-danger">Khóa</span>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    @if($user->events->count())
        {{-- events table --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Vé tham gia</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên sự kiện</th>
                            <th>Sử dụng</th>
                            <th>Thời gian có</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Tên sự kiện</th>
                            <th>Sử dụng</th>
                            <th>Thời gian có</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($user->events as $key => $event)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <th><a href="{{ route('events.detail', $event->id) }}">{{ $event->name }}</a></th>
                                <th>
                                    @if($event->supplier_id)
                                        <p class="text-success">Chưa sử dụng</p>
                                    @else
                                        <p class="text-danger">Đã sử dụng</p>
                                    @endif
                                </th>
                                <th>{{ date_format(date_create($event->created_at) ,"d/m/Y") }}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Không có vé nào nào</h4>
            </div>
        </div>
    @endif
@endsection

@section('css_scripts')
    <style>
        img.avatar {
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
@endsection

@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection
