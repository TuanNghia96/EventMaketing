@extends('layouts.backend.admin')

@section('title', 'Tạo tài khoản nhân viên')

@section('content')
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <div class="card-header">
        <div class="card-title">Tạo danh mục.</div>
    </div>
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        @include('backend.admins.form')
    </form>
@endsection
@section('inline_scripts')
    <script>
        $(document).ready(function () {
            $('#datepicker').datetimepicker({
                format: 'DD/MM/YYYY',
            });
        });
    </script>
@endsection