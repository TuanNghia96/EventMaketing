@extends('layouts.default')

@section('title', 'Cập nhật người dùng')

@section('content')
    <div class="col-md-8 border border-success rounded p-4">
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @include('users.form', ['method' => 'PUT', 'submit' => 'Cập nhật'])
        </form>
    </div>
@endsection
