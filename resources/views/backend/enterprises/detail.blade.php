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
                <td><p>{{ $user->enterprise_code }}</p></td>
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
                    <p>Thành phố</p>
                </td>
                <td><p>{{ $user->city }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Ảnh đại diện</p>
                </td>
                <td><img src="{{ asset($user->avatar) }}" alt=""></td>
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
            </tbody>
        </table>
    </div>
@endsection

@section('inline_scripts')
@endsection