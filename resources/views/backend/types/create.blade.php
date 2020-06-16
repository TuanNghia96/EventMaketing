@extends('layouts.backend.admin')

@section('title', 'Tạo thể loại')

@section('content')
    <div class="card-header">
        <div class="card-title">Tạo thể loại.</div>
    </div>
    <form action="{{ route('types.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group @error('name') has-error @enderror">
                <label for="name">Tên</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Thể loại là trường duy nhất." value="{{ old('name') }}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-action">
            <button type="submit" class="btn btn-success">Tạo</button>
            <a href="{{ url()->previous() }}" class="btn btn-danger">Quay lại</a>
        </div>
    </form>
@endsection
