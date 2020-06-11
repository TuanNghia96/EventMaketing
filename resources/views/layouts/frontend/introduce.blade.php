<div class="homepage-info-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-5">
                <figure>
                    <img src="{{ asset('frontend/images/logo-2.png')}}" alt="logo">
                </figure>
            </div>

            <div class="col-12 col-md-8 col-lg-7">
                <header class="entry-header">
                    <h2 class="entry-title">Agenda là gì và vì sao lại chọn chúng tôi?</h2>
                </header>

                <div class="entry-content">
                    <p>Chúng tôi yêu sự kiện vì sự kiện đem mọi người lại với nhau. Chúng tôi cung cấp sự kiện cho nhà cung cấp và người tham gia. Sự kiện trên website của chúng tôi luôn đem lại những giá trị tốt đẹp đến người dùng.</p>
                </div>

                <footer class="entry-footer">
                    <a href="{{ route('contact.about') }}" class="btn gradient-bg">Xem thêm</a>
                    @guest()
                        <a href="{{ route('register') }}" class="btn dark">Đăng kí ngay</a>
                    @endguest
                </footer>
            </div>
        </div>
    </div>
</div>