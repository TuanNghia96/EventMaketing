@extends('layouts.frontend.app')

@section('title', 'Agenda| Thông tin cá nhân')

@section('background_header')
    <div class="page-header single-event-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Thông tin cá nhân.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="col-12 row">
            <div class="col-4 md-form row">
                <div class="col-12">
                    <label>Ảnh đại diện: </label>
                </div>
                <div class="col">
                    <img class="avatar" src="{{ asset($user->avatar) }}" alt="">
                </div>
            </div>
            <div class="col-8 md-form row">
                <div class="col-md-6 mb-3 md-form row">
                    <div class="col-md-3">
                        <label>Email: </label>
                    </div>
                    <div class="col"><b>{{ \Auth::user()->email }}</b></div>
                </div>
                <div class="col-md-6 mb-3 md-form row">
                    <div class="col-md-3">
                        <label>Tên: </label>
                    </div>
                    <div class="col"><b>{{ $user->name }}</b></div>
                </div>
                <div class="col-md-6 mb-3 md-form row">
                    <div class="col-md-3">
                        <label>SDT: </label>
                    </div>
                    <div class="col"><b>{{ $user->phone }}</b></div>
                </div>
                <div class="col-md-6 mb-3 md-form row">
                    <div class="col-md-3">
                        <label>Địa chỉ: </label>
                    </div>
                    <div class="col"><b>{{ $user->address }}</b></div>
                </div>
                <div class="col-md-6 mb-3 md-form row">
                    <div class="col-md-3">
                        <label>Tk: </label>
                    </div>
                    <div class="col"><b>{{ $user->bank_account }}</b></div>
                </div>
                {{--  <div class="col-md-6 mb-3 md-form row">
                    <div class="col-md-3">
                        <label>Địa chỉ: </label>
                    </div>
                    <div class="col"><b>{{ $user->event_type ? $types[$user->event_type] : 'Không có' }}</b></div>
                </div>
                <div class="col-md-6 mb-3 md-form row">
                    <div class="col-md-3">
                        <label>SDT: </label>
                    </div>
                    <div class="col"><b>{{ $user->event_category ? $types[$user->event_category] : 'Không có' }}</b></div>
                </div>  --}}
            </div>
            <div class="col-12 text-center mb-5">
                <a class="btn btn-default" href="{{ route('users.edit') }}">Thay đổi</a>
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
@endsection
