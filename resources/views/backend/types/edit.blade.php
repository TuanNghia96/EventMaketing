@extends('layouts.backend.admin')

@section('title', 'Sửa thể loại')

@section('content')
    <div class="card-header">
        <div class="card-title">Sửa thể loại.</div>
    </div>
    <form action="{{ route('types.update', $type->id) }}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <input type="hidden" value="{{ $type->id }}" name="id">
        <div class="card-body">
            <div class="form-group @error('name') has-error @enderror">
                <label for="name">Tên</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Thể loại là trường duy nhất." value="{{ old('name') ?? $type->name }}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-action">
            <button type="submit" class="btn btn-success">Sửa</button>
            <a href="{{ url()->previous() }}" class="btn btn-danger">Quay lại</a>
        </div>
    </form>
@endsection
