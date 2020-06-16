@extends('layouts.backend.admin')

@section('title', 'Danh sách sự kiện đang chờ')

@section('content')
    @include('backend.events.table', ['title' => 'Danh sách sự kiện đang chờ'])
@endsection
@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection