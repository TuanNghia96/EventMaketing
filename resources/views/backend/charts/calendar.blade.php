@extends('layouts.backend.admin')

@section('title', 'Lịch sự kiện')

@section('content')
    <div class="page-inner">
        <h4 class="page-title">Lịch sự kiện theo thời gian công bố</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{--<div class="card-title">Full Calendar</div>--}}
                        @php($status = \App\Models\Event::$status)
                        <div class="card-category">
                            <button disabled class="btn-default"></button>&nbsp;{{ $status[\App\Models\Event::WAITING] }}

                            <button disabled class="btn-primary"></button>&nbsp;{{ $status[\App\Models\Event::VALIDATED] }}

                            <button disabled class="btn-danger"></button>&nbsp;{{ $status[\App\Models\Event::CANCEL] }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="calendar">
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
            console.log(new Date(2020, 7, 5 - 3, 16, 0));
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            var className = Array('fc-primary', 'fc-danger', 'fc-default', 'fc-success', 'fc-info', 'fc-warning', 'fc-danger-solid', 'fc-warning-solid', 'fc-success-solid', 'fc-default-solid', 'fc-success-solid', 'fc-primary-solid');

            $calendar = $('#calendar');
            $calendar.fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                selectable: true,
                selectHelper: true,
                select: function (start, end) {

                    // on select we show the Sweet Alert modal with an input
                    swal({
                        title: 'Create an Event',
                        html: '<br><input class="form-control" placeholder="Event Title" id="input-field">',
                        content: {
                            element: "input",
                            attributes: {
                                placeholder: "Event Title",
                                type: "text",
                                id: "input-field",
                                className: "form-control"
                            },
                        },
                        buttons: {
                            cancel: true,
                            confirm: true,
                        },
                    }).then(
                        function () {
                            var eventData;
                            var classRandom = className[Math.floor(Math.random() * className.length)];
                            event_title = $('#input-field').val();

                            if (event_title) {
                                eventData = {
                                    title: event_title,
                                    start: start,
                                    className: classRandom,
                                    end: end
                                };
                                $calendar.fullCalendar('renderEvent', eventData, true); // stick? = true
                            }

                            $calendar.fullCalendar('unselect');
                        }
                    );
                },
                events: <?php echo $events?>,


            });
        });
    </script>
@endsection
