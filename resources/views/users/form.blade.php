@method($method)
@csrf
<input type="hidden" name="id" value="{{ $user->id ?? null }}">
{{-- email --}}
<div class="form-group @error('email') text-danger @enderror">
    <label for="email">Địa chỉ email:</label>
    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') ?? $user->email ?? null }}">
    @error('email')
        <div>{{ $message }}</div>
    @enderror
</div>
{{-- pasword --}}
<div class="form-group @error('password') text-danger @enderror">
    <label for="pwd">Mật khẩu:</label>
    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="pwd">
    @error('password')
        <div>{{ $message }}</div>
    @enderror
</div>
{{-- password_confirmation --}}
<div class="form-group @error('password_confirmation') text-danger @enderror">
    <label for="pwd2">Mật khẩu xác nhận:</label>
    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="pwd2">
    @error('password_confirmation')
        <div>{{ $message }}</div>
    @enderror
</div>
{{-- name --}}
<div class="form-group @error('name') text-danger @enderror">
    <label for="name">Tên:</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') ?? $user->name ?? null }}">
    @error('name')
        <div>{{ $message }}</div>
    @enderror
</div>
{{-- address --}}
<div class="form-group @error('address') text-danger @enderror">
    <label for="address">Địa chỉ:</label>
    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ old('address') ?? $user->address ?? null }}">
    @error('address')
        <div>{{ $message }}</div>
    @enderror
</div>
{{-- phone --}}
<div class="form-group @error('phone') text-danger @enderror">
    <label for="phone">Số điện thoại:</label>
    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') ?? $user->phone ?? null }}">
    @error('phone')
        <div>{{ $message }}</div>
    @enderror
</div>
{{-- role --}}
<div class="form-group mt-4">
    <label @error('role') class="text-danger" @enderror for="role">Vai trò :</label>
    <div class="form-check-inline ml-3 w-25">
        <select name="role" class="form-control" id="role">
            @foreach(\App\Models\User::$role as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>
@error('role')
    <div class="text-danger">{{ $message }}</div>
@enderror
<div class="form-group mt-4">
    <label @error('classroom_id') class="text-danger" @enderror for="classroom-id">Tên lớp:</label>
    <div class="form-check-inline ml-3 w-25">
        <select name="classroom_id" class="form-control" id="classroom-id">
            @foreach(App\Models\Classroom::pluck('name', 'id') as $id => $value)
                <option value="{{ $id }}" {{ (old('classroom_id') == $id) ? 'selected' : null }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>
@error('classroom_id')
    <div class="text-danger">{{ $message }}</div>
@enderror
<div class="text-center">
    <button type="submit" class="btn btn-primary">{{ $submit }}</button>
</div>
