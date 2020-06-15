@extends('layouts.backend.admin')

@section('title', 'Chi tiết nhân viên')

@section('content')
    <div class="card-header row">
        <div class="card-title col">Chi tiết nhân viên</div>
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
                <td><p>{{ $user->admin_code }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tên</p>
                </td>
                <td><p>{{ $user->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Ngày sinh:</p>
                </td>
                <td><p>{{ date('d-m-Y', strtotime($user->birthday)) }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Trạng thái</p>
                </td>
                <td>
                    @if($user->deleted_at)
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