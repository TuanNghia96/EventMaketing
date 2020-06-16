<div class="sidebar" data-background-color="dark">
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('backend/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <span class="user-level">{{ Auth::user()->user_name }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('admin.show', \Auth::user()->user->id) }}">
                                    <span class="link-collapse">Thông tin</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.edit') }}">
                                    <span class="link-collapse">Cập nhật thông tin</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-cube"></i>
                        <p>Quản lý sự kiện</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('events.index') }}">
                                    <span class="sub-item">Danh mục sự kiện</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('events.validated') }}">
                                    <span class="sub-item">Sự kiện đang diễn ra</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('events.waiting') }}">
                                    <span class="sub-item">Sự kiện đang chờ</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('types.index') }}">
                                    <span class="sub-item">Thể loại sự kiện</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('categories.index') }}">
                                    <span class="sub-item">Danh mục sự kiện</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('coupons.index') }}">
                                    <span class="sub-item">Phiếu giảm giá.</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{--<li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-exchange-alt"></i>
                        <p>Giao dịch</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Hóa đơn</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Nhập hàng</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Trả hàng</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Xuất hủy</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>--}}
                <li class="nav-item">
                    <a data-toggle="collapse" href="#forms">
                        <i class="fas fa-male"></i>
                        <p>Đối tác</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('buyers.index') }}">
                                    <span class="sub-item">Khách hàng</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('enterprises.index') }}">
                                    <span class="sub-item">Nhà cung cấp</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#tables">
                        <i class="fas fa-user"></i>
                        <p>Nhân viên</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.index') }}">
                                    <span class="sub-item">Danh sách</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.create') }}">
                                    <span class="sub-item">Tạo mới</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#charts">
                        <i class="far fa-chart-bar"></i>
                        <p>Thống kê</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('chart.event') }}">
                                    <span class="sub-item">Sự kiện</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('chart.calendar') }}">
                                    <span class="sub-item">Lịch sự kiện</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
