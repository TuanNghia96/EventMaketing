@extends('mail.layout')

@section('content')
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p>Xin chào {{ $name }},</p>
                <p>Đây là vé tham gia sự kiện <b>{{ $event->name }}</b> online. Vui lòng giữ hoặc chụp lại vé này và mang đến sự kiện đang được tổ chức</p>
                <div style="text-align: center">
                    <q style="font-size: 50%"><img src="{{$message->embed($url)}}">
                </div>
                <h5><b>Thành viên:</b>"{{ $name }}"</h5>
                <h5><b>Sự kiện:</b><a href="{{ route('events.detail', $event->id) }}">{{ $event->name }}</a></h5>
                <div>
                </div>
                <p>Đây là thư gửi đến bạn tự động vui lòng không gửi thư đến địa chỉ này.</p>
                <p>Cảm ơn ban đã sử dụng dịch vụ của chúng tôi.</p>
            </td>
        </tr>
    </table>
@endsection
