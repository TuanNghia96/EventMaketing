@extends('layouts.default')

@section('title', 'Thêm mới người dùng')

@section('content')
    <div class="col-md-8 border border-primary rounded p-4">
        <form method="post" action="{{ route('users.store') }}">
            @include('users.form', ['method' => null, 'submit' => 'Thêm mới'])
        </form>
    </div>
@endsection
