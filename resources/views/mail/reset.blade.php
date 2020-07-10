@extends('mail.layout')

@section('content')
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p>Xin chào {{ $name }},</p>
                <p>Đây là thư đặt lại mật khẩu</p>
                <div>
                <p>Vui lòng vào đường dẫn này: <a href="{{ $url }}">{{$url}}</a></p>
                </div>
                <p>Đây là thư gửi đến bạn tự động vui lòng không gửi thư đến địa chỉ này.</p>
                <p>Cảm ơn ban đã sử dụng dịch vụ của chúng tôi.</p>
            </td>
        </tr>
    </table>
@endsection
