@extends('layouts.backend.admin')

@section('title', 'Chi tiết sự kiện')

@section('content')
    <div class="card-header">
        <div class="card-title">Chi tiết danh mục.</div>
        {{--<div class="card-category">Card Category</div>--}}
    </div>
    <div class="card-body">
        <table class="table table-typo">
            <tbody>
            <tr>
                <td>
                    <p>id</p>
                </td>
                <td><p>{{ $category->id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tên</p>
                </td>
                <td><p>{{ $category->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tình trạng</p>
                </td>
                <td>
                    @if($category->deleted_at)
                        <p class="text-danger">NGỪNG HOẠT ĐỘNG</p>
                    @else
                        <p class="text-success">ĐANG HOẠT ĐỘNG</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <p>Quản lý</p>
                </td>
                <td>
                    <form action="{{ !$category->deleted_at ? route('categories.destroy', $category->id) : route('categories.restore') }}" method="post">
                        @csrf
                        @if(!$category->deleted_at)
                            <input type="hidden" name="_method" value="delete">
                            <a class="btn btn-info" href="{{ route('categories.edit', $category->id) }}">Chỉnh sửa</a>
                            <button class="btn btn-danger">Xóa</button>
                        @else
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <button class="btn btn-success">Phục hồi</button>
                        @endif
                    </form>
                </td>

            </tr>
            </tbody>
        </table>
        <h3><b>Những sự kiện thuộc danh mục {{ $category->name }}.</b></h3>
        <br>
        <div class="table-responsive">
            <table id="multi-filter-select" class="display table table-striped table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Public Date</th>
                    <th>Coupon Id</th>
                    <th>Status</th>
                    <th>Point</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Public Date</th>
                    <th>Coupon Id</th>
                    <th>Status</th>
                    <th>Point</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($category->events as $key => $event)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <th><a href="{{ route('events.detail', $event->id) }}">{{ $event->name }}</a></th>
                        <th>{{ $event->code }}</th>
                        <th>{{ date_format(date_create($event->public_date) ,"d/m/Y") }}</th>
                        <th>{{ $event->coupon_id }}</th>
                        <th>{{ \App\Models\Event::$status[$event->status] }}</th>
                        <th>{{ $event->point }}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('inline_scripts')

    <script>
        $(document).ready(function () {
            $('#basic-datatables').DataTable({});
            
            $('#multi-filter-select').DataTable({
                "pageLength": 10,
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });
                        
                        column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });
            
            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });
            
            var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
            
            $('#addRowButton').click(function () {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');
                
            });
        });
    </script>
@endsection