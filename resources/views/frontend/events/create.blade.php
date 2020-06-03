@extends('layouts.frontend.app')

@section('background_header')
    <div class="page-header single-event-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Make event</h1>
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
                    <form method="post" class="row" action="{{ route('event.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="col-md-12 mb-3 md-form row">
                            <div class="col-md-4 mb-3 md-form">
                                <label for="validationCustom012">Name</label>
                                <input type="text" name="name" class="form-control" id="validationCustom012" placeholder="Event name" value="">
                                <div class="valid-feedback">
                                    {{--Looks good!--}}
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label for="validationCustom022">Title</label>
                                <input type="text" class="form-control" name="title" id="validationCustom022" value="">
                                <div class="valid-feedback">
                                    {{--Looks good!--}}
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label for="validationCustomUsername2">Location</label>
                                <input type="text" class="form-control" name="location" data-toggle="datetimepicker" aria-describedby="inputGroupPrepend2"
                                >
                                <div class="invalid-feedback">
                                    {{--Please choose a username.--}}
                                </div>
                            </div>

                            <div class="col-md-4 mb-3 md-form">
                                <label for="validationCustom042">Type</label>
                                <select name="type" class="form-control" id="">
                                    <option value=""></option>
                                    @foreach(\App\Models\Event::TYPE as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                {{--<input type="text" class="form-control" id="validationCustom042">--}}
                                <div class="invalid-feedback">
                                    {{--Please provide a valid state.--}}
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label for="validationCustom042">Classify</label>
                                <select name="classify" class="form-control" id="">
                                    <option value=""></option>
                                    @foreach(\App\Models\Event::$classify as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 md-form">
                                <label for="validatinonCustom032">Ticket Number(min: 100 ticket)</label>
                                <input type="text" class="form-control" name="ticket_number">
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 md-form row">
                            <div class="col-md-12">
                                <label for="validatinonCustom032">Summary</label>
                                <textarea name="summary" class="form-control" id="" cols="30" rows="8"></textarea>
                                {{--<input type="text" class="form-control" id="validationCustom032">--}}
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 md-form row">
                            <div class="col-md-12 mb-3 md-form row">
                                <div class="col-md-6">
                                    <label for="validationCustom012">Public date at</label>
                                    <input type="date" name="public_date" class="form-control datetime_picker" id="publicDate" autocomplete="off">
                                    <div class="valid-feedback">
                                        {{--Looks good!--}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom012">Public time at</label>
                                    <input type="time" name="public_time" class="form-control datetime_picker" required>
                                    <div class="valid-feedback">
                                        {{--Looks good!--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 md-form row">
                                <div class="col-md-6">
                                    <label for="validationCustom012">Start date at</label>
                                    <input type="date" name="start_date" class="form-control datetime_picker" id="publicDate" autocomplete="off">
                                    <div class="valid-feedback">
                                        {{--Looks good!--}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom012">Start time at</label>
                                    <input type="time" name="start_time" class="form-control datetime_picker" required>
                                    <div class="valid-feedback">
                                        {{--Looks good!--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 md-form row">
                                <div class="col-md-6">
                                    <label for="validationCustom012">End date at</label>
                                    <input type="date" name="end_date" class="form-control datetime_picker" id="publicDate" autocomplete="off">
                                    <div class="valid-feedback">
                                        {{--Looks good!--}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom012">End time at</label>
                                    <input type="time" name="end_time" class="form-control datetime_picker" required>
                                    <div class="valid-feedback">
                                        {{--Looks good!--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="app" class="col-md-12 mb-3 md-form">
                            <create-event></create-event>
                        </div>
                        <script src="/js/app.js"></script>
                        <div class="col-md-12 mb-12 md-form">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalLong">
                                Agree to terms and conditions
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
                                            Tôi hoàn toàn đồng ý với mọi điều khoản.
                                            <input class="form-check-input" type="checkbox" value="" id="agreeCheck" data-toggle="modal" data-target="#exampleModalLong">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                            <button class="btn btn-primary btn-lg btn-rounded" type="submit" id="submitBtn" disabled>Submit form</button>
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
