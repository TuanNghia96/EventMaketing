@extends('layouts.backend.admin')

@section('title', 'Danh sách sự kiện')

@section('content')
    @include('backend.events.table', ['title' => 'Danh sách tất cả sự kiện'])
@endsection

@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection