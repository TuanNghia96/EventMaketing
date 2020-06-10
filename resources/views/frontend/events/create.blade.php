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
    {{--@if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif--}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-form">
                    <form method="post" class="row" action="{{ route('event.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="col-md-12 mb-3 md-form row">
                            <div class="col-md-4 mb-3 md-form">
                                <label>Tên</label>
                                <input type="text" name="name" class="form-control" placeholder="Event name" value="{{ old('name') }}">
                                @error('name')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                @error('title')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label>Địa điểm chính (Nên sd gợi ý của google map)</label>
                                <input type="text" class="form-control" name="location" data-toggle="datetimepicker" aria-describedby="inputGroupPrepend2" value="{{ old('location') }}">
                                @error('location')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-3 mb-3 md-form">
                                <label>Thể loại</label>
                                <select name="type_id" class="form-control" id="">
                                    <option value=""></option>
                                    @foreach($types as $key => $value)
                                        <option value="{{ $key }}" @if($key == old('type_id')) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3 md-form">
                                <label>Danh mục</label>
                                <select name="category_id" class="form-control" id="">
                                    <option value=""></option>
                                    @foreach($categories as $key => $value)
                                        <option value="{{ $key }}" @if($key == old('category_id')) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3 md-form">
                                <label>Mã giảm giá</label>
                                <select name="coupon_id" class="form-control" id="">
                                    <option value="">Không kèm theo</option>
                                    @foreach($coupons as $key => $coupon)
                                        <option value="{{ $coupon }}" @if($coupon == old('coupon_id')) selected @endif>{{ $key . '%' }}</option>
                                    @endforeach
                                </select>
                                @error('coupon_id')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3 md-form">
                                <label>Số vé(min: 100 ticket)</label>
                                <input type="text" class="form-control" name="ticket_number" value="{{ old('ticket_number') }}">
                                @error('ticket_number')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 md-form row">
                            <div class="col-md-12">
                                <label for="validatinonCustom032">Nội dung</label>
                                <textarea class="form-control" id="" cols="30" rows="8">{{ old('summary') }}</textarea>
                                @error('summary')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 md-form row">
                            <div class="col-md-12 mb-3 md-form row">
                                <div class="col-md-6">
                                    <label>Ngày công bố</label>
                                    <input type="date" name="public_date" class="form-control datetime_picker" id="publicDate" autocomplete="off" value="{{ old('public_date') }}">
                                    @error('public_date')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Giờ công bố</label>
                                    <input type="time" name="public_time" class="form-control datetime_picker" value="{{ old('public_time') }}">
                                    @error('public_time')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 md-form row">
                                <div class="col-md-6">
                                    <label>Ngày bắt đầu</label>
                                    <input type="date" name="start_date" class="form-control datetime_picker" id="publicDate" value="{{ old('start_date') }}">
                                    @error('start_date')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Giờ bắt đầu</label>
                                    <input type="time" name="start_time" class="form-control datetime_picker" value="{{ old('start_time') }}">
                                    @error('start_time')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 md-form row">
                                <div class="col-md-6">
                                    <label>Ngày kết thúc</label>
                                    <input type="date" name="end_date" class="form-control datetime_picker" id="publicDate" value="{{ old('end_date') }}">
                                    @error('end_date')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Thời gian kết thúc</label>
                                    <input type="time" name="end_time" class="form-control datetime_picker" value="{{ old('end_time') }}">
                                    @error('end_time')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div id="app" class="col-md-12 mb-3 md-form">
                            <create-event
                                    old-images="{{ json_encode(old('images') ?? null) }}"
                                    all-error="{{ json_encode($errors->messages() ?? null) }}"
                            ></create-event>
                        </div>
                        <script src="/js/app.js"></script>
                        <div class="col-md-12 mb-12 md-form">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalLong">
                                Đồng ý với điều khoản
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Điều khoản sử dụng dịch vụ.</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <span>Tôi hoàn toàn đồng ý với mọi điều khoản.</span>
                                            <input class="form-check-input" type="checkbox" value="" id="agreeCheck" data-toggle="modal" data-target="#exampleModalLong">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                            <br>
                            <br>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-lg btn-rounded" type="submit" id="submitBtn" disabled>Tạo sự kiện</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="newsletter-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h2 class="entry-title">Subscribe to our newsletter to get the latest trends & news</h2>
                        <p>Join our database NOW!</p>
                    </header>

                    <div class="newsletter-form">
                        <form class="flex flex-wrap justify-content-center align-items-center">
                            <div class="col-md-12 col-lg-3">
                                <input type="text" placeholder="Name">
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <input type="email" placeholder="Your e-mail">
                            </div>

                            <div class="col-md-12 col-lg-3">
                                <input class="btn gradient-bg" type="submit" value="Subscribe">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('inline_css')
    <style>
        * {
            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 33.33%;
            padding: 5px;
        }

        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        a.disabled {
            pointer-events: none;
            color: #ccc;
        }

        #event_thumbnail {
            width: 100%;
            height: auto
        }
    </style>
@endsection


@section('inline_script')
    <script type='text/javascript' src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/summernote/summernote-bs4.min.js') }}"></script>
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
