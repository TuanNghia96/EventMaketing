@extends('layouts.frontend.app')

@section('title', 'Agenda| Liên hệ')

@section('background_header')
    <div class="page-header contact-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Liên hệ.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-form">
                    <form method="post" class="row" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="col-12 col-md-4">
                            <label for="">Tên</label>
                            @guest()
                                <input type="text" id="fname" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
                            @else
                                <input type="text" id="fname" name="name" class="form-control" placeholder="Name" value="{{ Auth::user()->name }}" readonly required>
                            @endguest
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="">Số điện thoại</label>
                            @guest()
                                <input type="text" id="" name="phone" class="form-control" placeholder="Phone number" value="{{ old('phone') }}">
                            @else
                                <input type="text" id="" name="phone" class="form-control" placeholder="Phone number" value="{{ Auth::user()->user->phone }}" readonly>
                            @endguest
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="">Địa chỉ mail</label>
                            @guest()
                                <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                            @else
                                <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ Auth::user()->email }}" readonly>
                            @endguest
                        </div>
                        <div class="col-12">
                            <label for="">Tiêu đề</label>
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}" required>
                        </div>
                        <div class="col-12">
                            <label for="">Nội dung</label>
                            <textarea placeholder="Message" name="message" rows="8">{{ old('message') }}</textarea>
                        </div>
                        <div class="col-12 flex justify-content-center"><input class="btn gradient-bg" type="submit" value="Gửi tin nhắn"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
