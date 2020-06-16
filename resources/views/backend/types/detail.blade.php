@extends('layouts.backend.admin')

@section('title', 'Chi tiết thể loại')

@section('content')
    <div class="card-header">
        <div class="card-title">Chi tiết thể loại.</div>
        {{--<div class="card-category">Card Category</div>--}}
    </div>
    <div class="card-body">
        <table class="table table-typo">
            <tbody>
            <tr>
                <td>
                    <p>id</p>
                </td>
                <td><p>{{ $type->id }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>name</p>
                </td>
                <td><p>{{ $type->name }}</p></td>
            </tr>
            <tr>
                <td>
                    <p>Tình trạng</p>
                </td>
                <td>
                    @if($type->deleted_at)
                        <p class="text-danger">NGỪNG HOẠT ĐỘNG</p>
                    @else
                        <p class="text-success">ĐANG HOẠT ĐỘNG</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <p>Quản lý</p>
                </td>
                <td>
                    <form action="{{ !$type->deleted_at ? route('types.destroy', $type->id) : route('types.restore') }}" method="post">
                        @csrf
                        @if(!$type->deleted_at)
                            <input type="hidden" name="_method" value="delete">
                            <a class="btn btn-info" href="{{ route('types.edit', $type->id) }}">Chỉnh sửa</a>
                            <button class="btn btn-danger">Xóa</button>
                        @else
                            <input type="hidden" name="id" value="{{ $type->id }}">
                            <button class="btn btn-success">Phục hồi</button>
                        @endif
                    </form>
                </td>

            </tr>
            </tbody>
        </table>
        <h3><b>Những sự kiện thuộc thể loại {{ $type->name }}.</b></h3>
        <br>
        @include('backend.events.table', ['events' => $type->events])
    </div>
@endsection
@section('inline_scripts')
    @include('layouts.backend.table_script')
@endsection
