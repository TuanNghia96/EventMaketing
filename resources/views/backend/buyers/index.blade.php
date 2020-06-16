@extends('layouts.backend.admin')

@section('title', 'Danh sách người mua')

@section('content')
    {{-- check buyers is empty --}}
    @if($users->count())
        {{-- buyers table --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Danh sách người mua</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên</th>
                            <th>Mã</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Sdt</th>
                            <th>Tk ngân hàng</th>
                            <th>Tg khởi tạo</th>
                            <th>Trạng thái</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Tên</th>
                            <th>Mã</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Sdt</th>
                            <th>Tk ngân hàng</th>
                            <th>Tg khởi tạo</th>
                            <th>Trạng thái</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <th><a href="{{ route('buyers.show', $user->id) }}">{{ $user->name }}</a></th>
                                <th>{{ $user->buyer_code }}</th>
                                <th>{{ $user->user->email }}</th>
                                <th>{{ $user->address }}</th>
                                <th>{{ $user->phone }}</th>
                                <th>{{ $user->bank_account }}</th>
                                <th>{{ date_format(date_create($user->created_at) ,"H:i:s d/m/Y") }}</th>
                                <th>
                                    @if($user->status)
                                        <span class="badge badge-danger">Khóa</span>
                                    @else
                                        <span class="badge badge-success">Hoạt động</span>
                                    @endif
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Không có người mua nào</h4>
            </div>
        </div>
    @endif


@endsection
@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection