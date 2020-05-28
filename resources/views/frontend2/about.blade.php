@extends('layouts.frontend.app')

@section('content')
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url({{ asset('frontend/images/img_bg_6.jpg') }});">
        <div class="overlay"></div>
        <div class="fh5co-container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>About Us</h1>
                            <h2>Hãy gửi chia sẻ, thắc mắc về chúng tôi <a href="{{ route('home') }}" target="_blank">Event Countdown</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="fh5co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-6 animate-box">
                    <h3>Liên lạc với chúng tôi</h3>
                    <form method="post" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="fname">Họ Tên *</label>
                                <input type="text" id="fname" name="name" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lname">Số điện thoại</label>
                                <input type="text" id="lname" name="phone" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email">Tên công ty(nếu là doanh nghiệp)</label>
                                <input type="text" id="cname" name="company_name" class="form-control" placeholder="">
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="subject">Tiêu đề</label>
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="message">Tin nhắn.</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Gửi" class="btn btn-primary">
                        </div>

                    </form>
                </div>
                <div class="col-md-5 col-md-pull-5 animate-box">

                    <div class="fh5co-contact-info">
                        <h3>Thông tin liên lạc</h3>
                        <ul>
                            <li class="address">1 Đại Cồ Việt, Bách Khoa, <br> Hai Bà Trưng, Hà Nội, Việt Nam</li>
                            <li class="phone"><a href="tel://1234567920">+84 398 100 765 </a></li>
                            <li class="email"><a href="mailto:nguyenbatuannghia5996@gmail.com">nguyenbatuannghia5996@gmail.com</a></li>
                            <li class="url"><a href="http://gettemplates.co">gettemplates.co</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div id="map" class="fh5co-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6963246222776!2d105.84315191421346!3d21.004806686011364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1588602925441!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- END map -->
@endsection

