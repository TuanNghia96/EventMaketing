@extends('layouts.backend.admin')

@section('title', 'Danh sách người dùng')

@section('btnAdd')
    <div class="col text-right">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
    </div>
@endsection

@section('content')
    <div class="mt-10">
        {{-- form search table --}}
        {{-- check coupons is empty --}}

        {{-- coupons table --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic</h4>
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