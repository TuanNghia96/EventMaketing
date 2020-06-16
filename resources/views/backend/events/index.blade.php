@extends('layouts.backend.admin')

@section('title', 'Danh sách sự kiện')

@section('content')
    {{-- check events is empty --}}
    @if($events->count())
        {{-- events table --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Danh sách tất cả sự kiện</h4>
            </div>
            <div class="card-body">
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
                        @foreach($events as $key => $event)
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
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Không có sự kiện nào</h4>
            </div>
        </div>
    @endif
@endsection

@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection