@extends('auth.layout')

@section('content')
<div class="wrapper wrapper-login">
    <div class="container container-login animated fadeIn">
        <h3 class="text-center">Log In</h3>
        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login-form">
                <div class="form-group">
                    <label for="email" class="placeholder"><b>Email</b><span class="required-label">*</span></label>
                    <input id="email" name="email" type="text" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="placeholder"><b>Password</b></label>
                    <a href="{{ route('password.reset') }}" class="link float-right">Forget Password ?</a>
                    <div class="position-relative">
                        <input id="password" name="password" type="password" class="form-control" required>
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group form-action-d-flex mb-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme">
                        <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Login</button>
                </div>
                <div class="login-account">
                    <span class="msg">Don't have an account yet ?</span>
                    <a href="{{ route('register') }}" id="show-signup" class="link">Sign Up</a>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
