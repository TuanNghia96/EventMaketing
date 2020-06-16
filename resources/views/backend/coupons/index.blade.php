@extends('layouts.backend.admin')

@section('title', 'Danh sách mã giảm giá')

@section('content')
    <div class="mt-10">
        {{-- coupons table --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Danh sách mã giảm giá</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>Created At</th>
                                    <th>Tình trạng</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>Created At</th>
                                    <th>Tình trạng</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($coupons as $key => $coupon)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <th>{{ $coupon->name }}</th>
                                        <th>{{ $coupon->title }}</th>
                                        <th>{{ $coupon->code }}</th>
                                        <th>{{ date_format(date_create($coupon->created_at) ,"H:i:s d/m/Y") }}</th>
                                        <th>
                                            @if($coupon->deleted_at)
                                                <p class="text-danger">NGỪNG HOẠT ĐỘNG </p>
                                            @else
                                                <p class="text-success"> ĐANG HOẠT ĐỘNG</p>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection
