@extends('layouts.default')

@section('title', 'Danh sách người dùng')

@section('btnAdd')
    <div class="col text-right">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
    </div>
@endsection

@section('content')
    <div class="mt-10">
        {{-- form search table --}}
        <div class="border border-primary rounded">
            <form action="{{ route('users.index') }}" method="get">
                <table class="table table-borderless">
                    <tr>
                        <th scope="col">Địa chỉ email</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Lớp</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control input" name="email" value="{{ request('email') }}">
                        </td>
                        <td>
                            <input type="text" class="form-control input" name="name" value="{{ request('name') }}">
                        </td>
                        <td>
                            <input type="text" class="form-control input" name="address" value="{{ request('address') }}">
                        </td>
                        <td>
                            <input type="text" class="form-control input" name="phone" value="{{ request('phone') }}">
                        </td>
                        <td>
                            <select name="classroom_id" class="form-control" id="classroom-id">
                                <option value="{{ null }}">-- Chọn lớp --</option>
                                @foreach(App\Models\Classroom::pluck('name', 'id') as $id => $value)
                                    <option value="{{ $id }}" {{ (request('classroom_id') == $id) ? 'selected' : null }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">
                            {{-- submit form button --}}
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            {{-- refresh js button --}}
                            <button id="bt-refesh" type="button" class="btn btn-secondary">Làm mới</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        {{-- check users is empty --}}
        @if(!$users->count())
            <span>{{ 'Không có kết quả tìm kiếm' }}</span>
        @else
            {{-- users table --}}
            <div>
                <table class="table">
                    <thead class="text-center">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Địa chỉ email</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col" class="cellinline">Vai trò</th>
                        <th scope="col" class="cellinline">Lớp</th>
                        @can('admin')
                            <th scope="col" class="cellinline">Hành động</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <th>{{ $users->perPage() * ($users->currentPage() - 1) + $key + 1 }}</th>
                            <td>{{ $user->email }}</td>
                            <td>{{ Helper::toUpperCase($user->name) }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ \App\Models\User::$role[$user->role] }}</td>
                            <td>{{ $user->classroom->name }}</td>
                            @can('admin')
                                {{--edit and delete--}}
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}">Cập nhật</a><br>
                                    <button class="btn btn-link text-danger" data-toggle="modal" data-target="{{ '#delete-modal' . $key }}">Xóa</button>
                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="{{ 'delete-modal' . $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form method="post" action="{{ route('users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" >Bạn có chắc chắn muốn xoá bản ghi này không?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                                    <button type="submit" class="btn btn-danger">OK</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{-- pagination link --}}
            <div class="text-center">{{ $users->appends(request()->input())->links() }}</div>
        @endif
    </div>
@endsection
