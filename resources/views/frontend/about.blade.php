@extends('layouts.frontend.app')

@section('title', 'Agenda| Về chúng tôi')

@section('background_header')
    <div class="page-header contact-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Giới thiệu.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @include('layouts.frontend.introduce')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="contact-location-details">
                    <h2 class="entry-title">Hà Nội</h2>

                    <div class="entry-content">
                        <p>Hiện nay, Tổng công ty Agenda có địa điểm làm việc ở 3 nơi. Trong đó, Hà nội là chủ sở chính chịu trách nhiệm kinh doanh toàn bộ các dịch vụ do Tổng công ty cung cấp.</p>
                        <br>
                    </div>

                    <footer class="entry-footer">
                        <ul>
                            <li class="contact-address">1 Đại Cồ Việt, Bách Khoa, Hai Bà Trưng, Hà Nội, Việt Nam</li>
                            <li class="contact-number">+84 667 889 661</li>
                            <li class="contact-email"><a href="#">HN_Agenda@gmail.com</a></li>
                        </ul>
                    </footer>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="contact-location-details">
                    <h2 class="entry-title">Đà Nẵng</h2>

                    <div class="entry-content">
                        <p>Với chi nhánh đặt ở Đà Nẵng, công ty Agenda Đà Nẵng đã và đang mở rộng phạm vi phát triển hơn nữa. Đây là chi nhánh quan trọng giúp cho các doanh nghiệp tiềm năng tại đây có được sự hỗ trợ tốt nhất.</p>
                    </div>

                    <footer class="entry-footer">
                        <ul>
                            <li class="contact-address">Nguyễn Văn Linh, Hòa Thuận Tây, Hải Châu, Đà Nẵng 550000, Việt Nam</li>
                            <li class="contact-number">+84 667 599 661</li>
                            <li class="contact-email"><a href="#">DN_Agenda@gmail.com</a></li>
                        </ul>
                    </footer>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="contact-location-details">
                    <h2 class="entry-title">Sài gòn</h2>

                    <div class="entry-content">
                        <p>Với chi nhánh đặt ở tp. Hồ Chí Minh, đây là nơi chịu trách nhiệm kinh doanh toàn bộ kế hoạch phát triển của Tổng Công ty trên địa bàn thành phố Hà Nội.</p>
                        <br>
                    </div>

                    <footer class="entry-footer">
                        <ul>
                            <li class="contact-address">Departure Loop, Phường 2, Tân Bình, Hồ Chí Minh, Việt Nam</li>
                            <li class="contact-number">+84 665 566 899</li>
                            <li class="contact-email"><a href="#">HCM_Agenda@gmail.com</a></li>
                        </ul>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-page-map">
        <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Bách Khoa, Hai Bà Trưng, Hà Nội, Việt Nam&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
@endsection
