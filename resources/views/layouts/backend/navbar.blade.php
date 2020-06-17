<nav class="navbar navbar-header navbar-expand-lg">
    
    <div class="container-fluid">
        <div class="collapse" id="search-nav">
            <form class="navbar-left navbar-form nav-search mr-md-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search pr-1">
                            <i class="fa fa-search search-icon"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="Tìm kiếm ..." class="form-control">
                </div>
            </form>
        </div>
        @php
            $notifications = \App\Models\Notification::unread()->get();
                $count = $notifications->count() ?? 0;
        @endphp
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret submenu show dropdown-notifications">
                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-bell"></i>
                    <span class="notification" id="count">{{ $count }}</span>
                </a>
                <ul class="dropdown-menu notif-box animated fadeIn show" aria-labelledby="notifDropdown">
                    <li>
                        <div class="dropdown-title">Bạn có {{ $count }} thông báo</div>
                    </li>
                    <li class="pusher">
                        @foreach($notifications as $key => $value)
                            <div class="scroll-wrapper notif-scroll scrollbar-outer" style="position: relative;">
                                <div class="notif-center">
                                        <a href="{{ $value->message . '?noti=' . $value->id }}">
                                            <div class="notif-icon notif-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> </div>
                                            <div class="notif-content">
													<span class="block">
														{{ $value->title }}
													</span>
                                                <span class="time">{{ $value->created_at->diffForHumans(now()) }}</span>
                                            </div>
                                        </a>
                                    </div>
                            </div>
                        @endforeach
                    </li>
                    <li>
                        <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{ asset('backend/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <li>
                        <div class="user-box">
                            <div class="avatar-lg"><img src="{{ asset('backend/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded"></div>
                            <div class="u-text">
                                <h4></h4>
                                <p class="text-muted"></p><a href="#" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.show', \Auth::user()->user->id) }}">Thông tin</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.edit') }}">Cài đặt tài khoản</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Đăng xuất') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
