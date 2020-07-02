@extends('layouts.backend.admin')

@section('title', 'Danh sách thể loại')

@section('content')
    {{-- check types is empty --}}
    @if($types->count())
        {{-- types table --}}
        <div class="card">
            <div class="card-header row">
                <div class="col">
                    <h4 class="card-title">Danh sách tất cả thể loại</h4>
                </div>
                <div class="col text-right">
                    <a href="{{ route('types.create') }}" class="btn btn-success">Thêm mới.</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tên</th>
                            <th>Thời gian tạo</th>
                            <th>Tình trạng</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Tên</th>
                            <th>Thời gian tạo</th>
                            <th>Tình trạng</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($types as $key => $type)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <th><a href="{{ route('types.show', $type->id) }}">{{ $type->name }}</a></th>
                                <th>{{ date_format(date_create($type->created_at) ,"H:i:s d/m/Y") }}</th>
                                <th>
                                    @if($type->status)
                                        <p class="text-success"> ĐANG HOẠT ĐỘNG</p>
                                    @else
                                        <p class="text-danger">NGỪNG HOẠT ĐỘNG </p>
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
                <h4 class="card-title">Không có nhà cung cấp nào</h4>
            </div>
        </div>
    @endif
@endsection

@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection