@extends('layouts.backend.admin')

@section('title', 'Danh sách doanh nghiệp')

@section('content')
    {{-- check events is empty --}}
    @if($users->count())
        {{-- events table --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Danh sách doanh nghiệp</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Stt.</th>
                            <th>Tên</th>
                            <th>Mã số</th>
                            <th>Tài khoản</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tk ngân hàng</th>
                            <th>Thời gian sử dụng</th>
                            <th>Trạng thái</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            
                            <th>Stt.</th>
                            <th>Tên</th>
                            <th>Mã số</th>
                            <th>Tài khoản</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tk ngân hàng</th>
                            <th>Thời gian sử dụng</th>
                            <th>Trạng thái</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $key => $user)
                            
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <th><a href="{{ route('enterprises.show', $user->id) }}">
                                    {{ $user->name }}
                                    </a></th>
                                <th>{{ $user->enterprise_code }}</th>
                                <th>{{ $user->user->email }}</th>
                                <th>{{ $user->address }}</th>
                                <th>{{ $user->phone }}</th>
                                <th>{{ $user->bank_account }}</th>
                                <th>{{ date_format(date_create($user->created_at) ,"H:i:s d/m/Y") }}</th>
                                <th>
                                    @if($user->deleted_at)
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
                <h4 class="card-title">Không có doanh nghiệp nào</h4>
            </div>
        </div>
    @endif
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