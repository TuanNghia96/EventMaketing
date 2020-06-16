@extends('layouts.backend.admin')

@section('title', 'Chi tiết danh mục')

@section('content')
    <div class="card-header">
        <div class="card-title">Chi tiết danh mục.</div>
    </div>
    <div class="card-body">
        <table class="table table-typo">
            <tbody>
            <tr>
                <td>
                    <p>id</p>
                </td>
                <td><p>{{ $category->id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tên</p>
                </td>
                <td><p>{{ $category->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tình trạng</p>
                </td>
                <td>
                    @if($category->status)
                        <p class="text-success">ĐANG HOẠT ĐỘNG</p>
                    @else
                        <p class="text-danger">NGỪNG HOẠT ĐỘNG </p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <p>Quản lý</p>
                </td>
                <td>
                    <form action="{{ $category->status ? route('categories.destroy', $category->id) : route('categories.restore') }}" method="post">
                        @csrf
                        @if($category->status)
                            <input type="hidden" name="_method" value="delete">
                            <a class="btn btn-info" href="{{ route('categories.edit', $category->id) }}">Chỉnh sửa</a>
                            <button class="btn btn-danger">Khóa</button>
                        @else
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <button class="btn btn-success">Phục hồi</button>
                        @endif
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        <h3><b>Những sự kiện thuộc danh mục {{ $category->name }}.</b></h3>
        <br>
        @include('backend.events.table', ['events' => $category->events])
    </div>
@endsection
@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection