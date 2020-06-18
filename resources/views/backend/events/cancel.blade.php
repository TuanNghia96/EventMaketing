@extends('layouts.backend.admin')

@section('title', 'Danh sách sự kiện chờ hủy')

@section('content')
    @include('backend.events.table', ['title' => 'Danh sách sự kiện chờ hủy'])
@endsection
@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection