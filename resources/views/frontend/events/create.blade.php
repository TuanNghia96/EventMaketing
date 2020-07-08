@extends('layouts.frontend.app')

@section('title', 'Agenda| Tạo sự kiện')

@section('background_header')
    <div class="page-header single-event-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Khởi tạo sự kiện mới</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div id="app">
                <create-event
                        store-url="{{ route('event.store') }}"
                        supplier="{{ \Auth::user()->user }}"
                        csrf="{{ csrf_token() }}"
                        all-type="{{ json_encode($types ?? null) }}"
                        all-category="{{ json_encode($categories ?? null) }}"
                        all-coupon="{{ json_encode($coupons ?? null) }}"
                        old="{{ json_encode(old() ?? null) }}"
                        old-images="{{ json_encode(old('images') ?? null) }}"
                        all-error="{{ json_encode($errors->messages() ?? null) }}"
                ></create-event>
            </div>
            <script src="/js/app.js"></script>
        </div>
    </div>
@endsection

@section('inline_script')
    <script type='text/javascript' src="{{ asset('frontend/js/custom.js') }}"></script>
    <script !src="">
        $('#agreeCheck').change(function () {
            if (this.checked) {
                $('#submitBtn').prop("disabled", false);
            } else {
                $('#submitBtn').prop("disabled", true);

            }
        });
    </script>
@endsection
