@extends('layouts.backend.admin')

@section('title', 'Danh sách danh mục')

@section('content')
    {{-- check categories is empty --}}
    @if($categories->count())
        {{-- categories table --}}
        <div class="card">
            <div class="card-header row">
                <div class="col">
                    <h4 class="card-title">Danh sách tất cả danh mục</h4>
                </div>
                <div class="col text-right">
                    <a href="{{ route('categories.create') }}" class="btn btn-success">Thêm mới.</a>
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
                        @foreach($categories as $key => $category)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <th><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></th>
                                <th>{{ date_format(date_create($category->created_at) ,"H:i:s d/m/Y") }}</th>
                                <th>
                                    @if($category->deleted_at)
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
    @else
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Không có doanh nghiệp nào</h4>
            </div>
        </div>
    @endif
@endsection

@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection