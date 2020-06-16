@extends('layouts.backend.admin')

@section('title', 'Chi tiết người mua')

@section('content')
    <div class="card-header row">
        <div class="card-title col">Chi tiết người mua</div>
        <div class="col text-right">
            @if($user->status)
                <a class="btn btn-success" href="{{ route('buyers.restore', $user->id) }}">Phục hồi tài khoản</a>
            @else
                <a class="btn btn-danger" href="{{ route('buyers.delete', $user->id) }}">Khóa tài khoản</a>
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
                        <span class="badge badge-danger">Khóa</span>
                    @else
                        <span class="badge badge-success">Hoạt động</span>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('css_scripts')
    <style>
        img.avatar {
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
@endsection