@extends('layouts.frontend.app')

@section('title', 'Agenda| Thay đổi thông tin')

@section('background_header')
    <div class="page-header single-event-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Thay đổi thông tin cá nhân.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-form">
                    <form method="post" class="row" action="{{ route('users.post') }}" enctype="multipart/form-data" runat="server" novalidate>
                        @csrf
                        <div class="col-md-12 mb-3 md-form row">
                            <div class="col-md-4 mb-3 md-form">
                                <label>Email:</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ \Auth::user()->email }}">
                                @error('email')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label>Mật khẩu:</label>
                                <input type="text" name="password" class="form-control">
                                @error('password')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label>Mật khẩu nhập lại:</label>
                                <input type="text" name="confirm_password" class="form-control">
                                @error('confirm_password')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label>Họ:</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Last name" value="{{ $user->first_name }}">
                                @error('first_name')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label>Tên:</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Last name" value="{{ $user->last_name }}">
                                @error('last_name')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label>SDT:</label>
                                <input type="text" name="phone" class="form-control" placeholder="phone" value="{{ $user->phone }}">
                                @error('phone')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label>Địa chỉ:</label>
                                <input type="text" name="address" class="form-control" placeholder="address" value="{{ $user->address }}">
                                @error('address')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label>Tài khoản:</label>
                                <input type="text" name="bank_account" class="form-control" placeholder="bank_account" value="{{ $user->bank_account }}">
                                @error('bank_account')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label>Thể loại yêu thích</label>
                                <select name="event_type" class="form-control" id="">
                                    <option value=""></option>
                                    @foreach($types as $key => $value)
                                        <option value="{{ $key }}" @if($key == (old('type_id') || $user->event_type)) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('event_type')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label>Thể loại yêu thích</label>
                                <select name="event_category" class="form-control" id="">
                                    <option value=""></option>
                                    @foreach($types as $key => $value)
                                        <option value="{{ $key }}" @if($key == (old('type_id') || $user->event_category)) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('event_category')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Avatar:</label>
                                <input type="file" id="imgInp" name="avatar" class="form-control col" placeholder="Event name" value="" accept="image/*" required>
                                @error('avatar')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 text-center">
                                <img class="avatar" id="blah" src="{{ asset($user->avatar) }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-12 mb-12 md-form">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-lg btn-rounded" type="submit" id="submitBtn">Thay đổi thông tin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('inline_css')
    <style>
        img.avatar {
            object-fit: cover;
            width: 180px;
            height: 180px;
            border-radius: 50%;
        }
    </style>
@endsection

@section('inline_script')
    <script type='text/javascript' src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        
        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
@endsection
