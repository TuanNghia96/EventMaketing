@extends('auth.layout')

@section('content')
<div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
        <h3 class="text-center">Đặt lại mật khẩu</h3>
        <form id="loginForm" method="POST" action="{{ route('password.post') }}">
            @csrf
            <div class="login-form">
                <input type="hidden" name="email" value="{{ request('email') }}">
                <input type="hidden" name="token" value="{{ request('token') }}">
                <div class="form-group">
                    <label for="email" class="placeholder"><b>Mật khẩu mới</b><span class="required-label">*</span></label>
                    <input id="email" name="password" type="password" class="form-control" required>
                </div>
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="email" class="placeholder"><b>Nhập lại mật khẩu mới</b><span class="required-label">*</span></label>
                    <input id="email" name="password_confirm" type="password" class="form-control" required>
                </div>
                @error('password_confirm')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group form-action-d-flex mb-3 text-center">
                    <button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Thay đổi</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
