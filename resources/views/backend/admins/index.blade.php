@extends('layouts.backend.admin')

@section('title', 'Danh sách quản lý')

@section('content')
    {{-- check admins is empty --}}
    @if($users->count())
        {{-- admins table --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Danh sách tất cả quản lý</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Admin Code</th>
                            <th>Account</th>
                            <th>Birthday</th>
                            <th>Start date</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Admin Code</th>
                            <th>Email</th>
                            <th>Birthday</th>
                            <th>Start date</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->admin_code }}</th>
                                <th>{{ $user->user->email }}</th>
                                <th>{{ date_format(date_create($user->birthday) ,"d/m/Y") }}</th>
                                <th>{{ $user->created_at }}</th>
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
                <h4 class="card-title">Không có quản lý nào</h4>
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