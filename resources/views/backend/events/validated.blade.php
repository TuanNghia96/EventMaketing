@extends('layouts.backend.admin')

@section('title', 'Danh sách sự kiện thành công.')

@section('content')
    @include('backend.events.table', ['title' => 'Danh sách sự kiện thành công'])
@endsection
@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection