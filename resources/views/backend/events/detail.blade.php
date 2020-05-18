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
                    <p>id</p>
                </td>
                <td><p>{{ $event->id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>name</p>
                </td>
                <td><p>{{ $event->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>title</p>
                </td>
                <td><p>{{ $event->title }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>code</p>
                </td>
                <td><p>{{ $event->code }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>location</p>
                </td>
                <td><p>{{ $event->location }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>summary</p>
                </td>
                <td><p>{{ $event->summary }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>avatar</p>
                </td>
                <td><p>{{ $event->avatar }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>type</p>
                </td>
                <td><p>{{ $event->type }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>public_date</p>
                </td>
                <td><p>{{ $event->public_date }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>start_date</p>
                </td>
                <td><p>{{ $event->start_date }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>end_date</p>
                </td>
                <td><p>{{ $event->end_date }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>voucher_id</p>
                </td>
                <td><p>{{ $event->voucher_id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>point</p>
                </td>
                <td><p>{{ $event->point }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>classify</p>
                </td>
                <td><p>{{ $event->classify }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>status</p>
                </td>
                <td><p>{{ $event->status }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>images</p>
                </td>
                <td><p>{{ $event->images }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>ticket_number</p>
                </td>
                <td><p>{{ $event->ticket_number }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Hành động</p>
                </td>
                <td>
                    @if($event->public_date < now())
                        <a class="btn btn-danger" href="{{ route('events.remove', $event->id) }}">
                            <span class="btn-label">
                                <i class="fa fa-times"></i>
                            </span>Remove
                        </a>
                    @endif
                    @if($event->status == \App\Models\Event::STATUS[0])
                        <a class="btn btn-success" href="{{ route('events.success', $event->id) }}">
                            <span class="btn-label">
                                <i class="fa fa-check"></i>
                            </span>Success
                        </a>
                    @endif
                </td>
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