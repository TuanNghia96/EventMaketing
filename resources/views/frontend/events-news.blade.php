@extends('layouts.frontend.app')

@section('title', 'Agenda| Trang chủ')

@section('background_header')
    <div class="page-header events-news-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Tin tức.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <article class="events-news-post">
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="#">Sơn tùng Sky tour</a></h2>

                        <div class="entry-meta flex align-items-center">
                            <div class="posted-author"><a href="#">tổ chức bởi MTP Entertain</a></div>

                            <div class="post-comments"><a href="#">2 Comments</a></div>
                        </div>
                    </header>

                    <figure>
                        <a href="#"><img src="{{ asset('frontend/images/news-1.jpg') }}" width="100%" alt=""></a>

                        <div class="posted-date"><span>July</span><span>11</span><span>‘20</span></div>
                    </figure>

                    <div class="entry-content">
                        <p>Sky, cộng đồng hâm mộ Sơn Tùng M-TP, đã và sẽ tổ chức những buổi xem chung để "sing along" - hát theo các ca khúc trong phim. Đây là văn hóa cổ vũ đậm chất K-pop, tạo nên bầu không khí sôi động tại rạp.

                            Về nội dung, Sky Tour mang đến một Sơn Tùng như người truyền cảm hứng trong mọi vai trò: một ca sĩ, một thần tượng giải trí và một chủ tịch kiêm doanh nhân.</p>
                    </div>
                </article>

                <article class="events-news-post">
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="#">Sự kiện ra mắt Bphone thế hệ mới.</a></h2>

                        <div class="entry-meta flex align-items-center">
                            <div class="posted-author"><a href="#">Tổ chức bởi BKAV</a></div>

                            <div class="post-comments"><a href="#">2 Comments</a></div>
                        </div>
                    </header>

                    <figure>
                        <a href="#"><img src="{{ asset('frontend/images/news-2.jpg') }}" width="100%" alt=""></a>

                        <div class="posted-date"><span>Oct</span><span>10</span><span>‘20</span></div>
                    </figure>

                    <div class="entry-content">
                        <p>Bkav đang cấp tập chuẩn bị cho sự kiện ra mắt chiếc điện thoại Bphone thế hệ thứ ba, diễn ra vào sáng mai (10/10) tại Hà Nội. Cổng chào sự kiện đã được dựng lên bên ngoài cổng Trung tâm Hội nghị Quốc Gia với hai màu chủ đạo đỏ và xanh.</p>
                    </div>
                </article>

                <article class="events-news-post">
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="#">Met Gala 2020 chính thức bị hủy bỏ</a></h2>

                        <div class="entry-meta flex align-items-center">
                            <div class="posted-author"><a href="#">Tổ chức bởi Vogue</a></div>

                            <div class="post-comments"><a href="#">2 Comments</a></div>
                        </div>
                    </header>

                    <figure>
                        <a href="#"><img src="{{ asset('frontend/images/news-3.jpg') }}" width="100%" alt=""></a>

                        <div class="posted-date"><span>Feb</span><span>11</span><span>‘18</span></div>
                    </figure>

                    <div class="entry-content">
                        <p>Hàng năm, cứ vào ngày thứ hai đầu tiên của tháng 5, cả thế giới lại mong chờ bữa tiệc thời trang Met Gala – một sự kiện được coi là "Oscar trong ngành thời trang". Tuy nhiên, năm nay, sau khi thông báo lùi lịch do dịch COVID-19, Vogue đã buộc phải đưa ra quyết định hủy sự kiện thời trang lớn nhất năm nay.</p>
                    </div>
                </article>
            </div>
        </div>

        {{--<div class="row">
            <div class="col-12">
                <div class="blog-pagination">
                    <ul class="flex align-items-center">
                        <li><a href="#">01</a></li>
                        <li class="active"><a href="#">02</a></li>
                        <li><a href="#">03</a></li>
                    </ul>
                </div>
            </div>
        </div>--}}
    </div>


@endsection

@section('inline_script')
    <script src="{{ asset('frontend/js/custom.js')}}"></script>
@endsection
