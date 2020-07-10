@extends('auth.layout')

@section('content')
<div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
        <h3 class="text-center">Lấy lại mật khẩu</h3>
        <form id="loginForm" method="GET" action="{{ route('password.send') }}">
            <div class="login-form">
                <div class="form-group">
                    <label for="email" class="placeholder"><b>Email</b><span class="required-label">*</span></label>
                    <input id="email" name="email" type="text" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="form-group form-action-d-flex mb-3 text-center">
                    <button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Reset</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
