@extends('layouts.backend.admin')

@section('title', 'Chi tiết sự kiện')

@section('content')
    <div class="card-header">
        <div class="card-title">Event detail</div>
        {{--<div class="card-category">Card Category</div>--}}
    </div>
    <div class="card-body">
        <table class="table table-typo">
            <tbody>
            <tr>
                <td>
                    <p>user_id</p>
                </td>
                <td><p>{{ $user->user_id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>email</p>
                </td>
                <td><p>{{ $user->user->email }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>user_name</p>
                </td>
                <td><p>{{ $user->user->user_name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>enterprise_code</p>
                </td>
                <td><p>{{ $user->enterprise_code }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>name</p>
                </td>
                <td><p>{{ $user->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>address</p>
                </td>
                <td><p>{{ $user->address }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>city</p>
                </td>
                <td><p>{{ $user->city }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>avatar</p>
                </td>
                <td><p>{{ $user->avatar }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>phone</p>
                </td>
                <td><p>{{ $user->phone }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>bank_account</p>
                </td>
                <td><p>{{ $user->bank_account }}</p></td>
            </tr>
            </tbody>
        </table>
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