@extends('layouts.frontend.app')

@section('content')
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{ asset('frontend/images/img_bg_7.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Event Countdown</h1>
                            <h2>Let join your event</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="fh5co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 md-form text-center">
                    <h1>Make event</h1>
                </div>
                <form class="needs-validation" method="post" action="{{ route('event.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-3 md-form">
                            <label for="validationCustom012">Name</label>
                            <input type="text" name="name" class="form-control" id="validationCustom012" placeholder="Event name" value=""
                            >
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
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3 md-form">
                            <label for="validatinonCustom032">Summary</label>
                            <textarea name="summary" class="form-control" id="" cols="30" rows="8"></textarea>
                            {{--<input type="text" class="form-control" id="validationCustom032">--}}
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 md-form">
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
                        <div class="col-md-3 mb-3 md-form">
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
                        <div class="col-md-6 mb-3 md-form">
                            <label for="validationCustom012">Public at</label>
                            <input type="text" name="public_date" class="form-control datetime_picker" id="">
                            <div class="valid-feedback">
                                {{--Looks good!--}}
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 md-form">
                            <label for="validationCustom012">Start at</label>
                            <input type="text" name="start_date" class="form-control datetime_picker" id="">
                            <div class="valid-feedback">
                                {{--Looks good!--}}
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 md-form">
                            <label for="validationCustom012">End at</label>
                            <input type="text" name="end_date" class="form-control datetime_picker" id="">
                            <div class="valid-feedback">
                                {{--Looks good!--}}
                            </div>
                        </div>
                    </div>
                        <create-event></create-event>
                    <div class="form-group">
                        <div class="form-check pl-0">
                            <div class="col-md-12 mb-12 md-form">
                                <input class="form-check-input" type="checkbox" value="" id="agreeCheck">
                                <label class="form-check-label" for="invalidCheck2">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                                <button class="btn btn-primary btn-lg btn-rounded" type="submit" id="submitBtn" disabled>Submit form</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('inline_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css.map">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endsection
@section('inline_script')
    <script src="{{ asset('frontend/js/moment.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $('.datetime_picker').datetimepicker();
        $('#agreeCheck').change(function() {
            if(this.checked) {
                $('#submitBtn').prop("disabled", false);
            } else {
                $('#submitBtn').prop("disabled", true);

            }
        });
    </script>
@endsection
