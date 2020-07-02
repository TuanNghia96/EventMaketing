@extends('mail.layout')

@section('content')
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p>Xin chào {{ $name }},</p>
                <p>Đây là thư thông báo hủy sự kiện <b>{{ $event->name }}</b> online.</p>
                
                <h5>Nhà cung cấp:"{{ $name }}"</h5>
                <h5>Sự kiện:{{ $event->name }}</h5>
                <h5>Ly do hủy:<b>&nbsp;&nbsp;{{ $reason }}</b></h5>
                <div>
                </div>
                <p>Đây là thư gửi đến bạn tự động vui lòng không gửi thư đến địa chỉ này.</p>
                <p>Cảm ơn ban đã sử dụng dịch vụ của chúng tôi.</p>
            </td>
        </tr>
    </table>
@endsection
