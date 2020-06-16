@csrf
<div class="card-body">
    <div class="form-group @error('email') has-error @enderror">
        <label for="name">Email <span class="text-danger">*</span>:</label>
        <input type="text" class="form-control" id="name" name="email" placeholder="" value="{{ old('email') ?? $user->email ?? null }}">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="card-body">
    <div class="form-group @error('password') has-error @enderror">
        <label for="name">Mật khẩu<span class="text-danger">*</span>:</label>
        <input type="password" class="form-control" id="name" name="password" placeholder="" value="">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="card-body">
    <div class="form-group @error('password_confirm') has-error @enderror">
        <label for="name">Nhập lại mật khẩu<span class="text-danger">*</span>:</label>
        <input type="password" class="form-control" id="name" name="password_confirm" placeholder="" value="">
        @error('password_confirm')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="card-body">
    <div class="form-group @error('name') has-error @enderror">
        <label for="name">Tên<span class="text-danger">*</span>:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ old('name') ?? $admin->name ?? null }}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="card-body">
    <div class="form-group @error('birthday') has-error @enderror">
        <label for="name">Ngày sinh</label>
        <div class="input-group">
            <input type="text" class="form-control" id="datepicker" name="birthday" value="{{ old('birthday') ?? (isset($admin->birthday) ? date('d/m/Y', strtotime($admin->birthday)) : null) }}">
            <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-calendar-check"></i>
                        </span>
            </div>
        </div>
        @error('birthday')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="card-action">
    <button type="submit" class="btn btn-success">Thay đổi</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger">Quay lại</a>
</div>
