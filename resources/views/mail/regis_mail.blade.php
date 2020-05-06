<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký tài khoản thành công.</title>
    <style>
        h2#title {
            padding: 23px;
            background: #b3deb8a1;
            border-bottom: 6px green solid;
        }
    </style>
</head>
<body>
    <h2 id="title">
        <a href="{{ round('users.index') }}">Thăm trang web của chúng tôi.</a>
    </h2>
    <p>Xin chào {{ $name }}</p>
    <p>Chúc mừng bạn đã đăng ký tài khoản thành công.</p>
    <strong>Cảm ơn vì đã sử dụng.</strong>
</body>
</html>
