@extends('auth.layout')

@section('content')
<div class="wrapper">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="wizard-container wizard-round col-md-9">
                    <div class="wizard-header text-center">
                        <h3 class="wizard-title"><b>Register</b> New Account</h3>
                        <small>This information will let us know more account you.</small>
                    </div>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="wizard-body">
                            <div class="row">

                                <ul class="wizard-menu nav nav-pills nav-primary">
                                    <li class="step" style="width: 33.3333%;">
                                        <a class="nav-link active" href="#account" data-toggle="tab" aria-expanded="true"><i class="fa fa-file mr-2"></i> Account</a>
                                    </li>
                                    <li class="step" style="width: 33.3333%;">
                                        <a class="nav-link" href="#about" data-toggle="tab"><i class="fa fa-user mr-0"></i> About</a>
                                    </li>
                                    <li class="step" style="width: 33.3333%;">
                                        <a class="nav-link" href="#address" data-toggle="tab"><i class="fa fa-map-signs mr-2"></i> Address</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="account">
                                    <h4 class="info-text">Tạo tài khoản đăng nhập </h4>
                                    <div class="row">
                                        <div class="col-md-8 ml-auto mr-auto">
                                            <div class="form-group @error('email') has-error @enderror">
                                                <label>Email :</label>
                                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                                @error('email')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group @error('password') has-error @enderror">
                                                <label>Mật khẩu :</label>
                                                <input type="password" name="password" class="form-control">
                                                @error('password')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group @error('confirmpassword') has-error @enderror">
                                                <label>Nhập lại mật khẩu :</label>
                                                <input type="password" name="confirmpassword" class="form-control">
                                                @error('confirmpassword')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                            @php($role = \App\Models\User::$role)
                                            <div class="form-group">
                                                <label>Tôi tham gia với tư cách là :</label><br>
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="supplier_check" name="role" class="custom-control-input" checked="" value="{{ \App\Models\User::BUYER }}">
                                                        <label class="custom-control-label" for="supplier_check">{{ $role[\App\Models\User::BUYER] }}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="byr_check" name="role" class="custom-control-input" @if(\App\Models\User::SUPPLIER == old('role')) checked @endif value="{{ \App\Models\User::SUPPLIER }}">
                                                        <label class="custom-control-label" for="byr_check">{{ $role[\App\Models\User::SUPPLIER] }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="info-text">Tell us who you are.</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group @error('first_name') has-error @enderror byr_class">
                                                <label class="">Họ:</label>
                                                <input name="first_name" type="text" class="form-control" value="{{ old('first_name') }}">
                                                @error('first_name')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group @error('text') has-error @enderror supplier_class">
                                                <label class="">Tiền tố(vd:Công ty, Công ty TNHH) :</label>
                                                <input name="" type="text" class="form-control" value="{{ old('text') }}">
                                                @error('text')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group @error('bank_account') has-error @enderror">
                                                <label>Tài khoản ngân hàng :</label>
                                                <input name="bank_account" type="text" class="form-control swith_required">
                                                @error('bank_account')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group @error('phone') has-error @enderror">
                                                <label>Số điện thoại(vd: 0123457896) :</label>
                                                <input name="phone" type="text" class="form-control" value="{{ old('phone') }}">
                                                @error('phone')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group @error('last_name') has-error @enderror byr_class">
                                                <label class="">Tên:</label>
                                                <input name="last_name" type="text" class="form-control" value="{{ old('last_name') }}">
                                                @error('last_name')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group @error('name') has-error @enderror supplier_class">
                                                <label class="">Tên cty :</label>
                                                <input name="name" type="text" class="form-control" value="{{ old('name') }}">
                                                @error('name')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group @error('avatar') has-error @enderror">
                                                <label>Picture :</label>
                                                <div class="input-file input-file-image">
                                                    <img class="img-upload-preview img-circle" width="100" height="100" src="http://placehold.it/100x100" alt="preview">
                                                    <input type="file" class="form-control form-control-file" id="uploadImg" name="avatar" accept="image/*">
                                                    <label for="uploadImg" class=" label-input-file btn btn-primary">Upload a Image</label>
                                                    @error('avatar')
                                                    <div>{{ $message }}</div>
                                                    @enderror
                                                    @if($errors->any())
                                                        <div>Xin chọn lại avatar</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="address">
                                    <h4 class="info-text">Tell us where you live.</h4>
                                    <div class="row">
                                        <div class="col-sm-8 ml-auto mr-auto">
                                            <div class="form-group @error('city') has-error @enderror supplier_class">
                                                <label>Thành phố :</label>
                                                <select name="city" class="form-control" value="{{ old('city') }}">
                                                    <option value="">-- Chọn thành phố --</option>
                                                    @foreach(\App\Models\Supplier::CITY as $key => $city)
                                                        <option value="{{ $key }}">{{ $city }}</option>
                                                    @endforeach
                                                </select>
                                                @error('city')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group @error('address') has-error @enderror">
                                                <label>Địa chỉ chi tiết</label>
                                                <input name="address" type="text" class="form-control" value="{{ old('address') }}">
                                                @error('address')
                                                <div>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="wizard-action">
                            <div class="pull-left">
                                <input type="button" class="btn btn-previous btn-fill btn-default" name="previous" value="Previous">
                            </div>
                            <div class="pull-right">
                                <input type="button" class="btn btn-next btn-danger" name="next" value="Next">
                                <input type="submit" class="btn btn-finish btn-danger" name="finish" value="Finish" style="display: none;">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Custom template -->
</div>
@endsection
