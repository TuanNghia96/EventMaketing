<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Event count')</title>

    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="{{ asset('frontend/images/logo.png') }}" type="image/x-icon">

    <!-- Fonts and icons -->
    <script src="{{ asset('backend/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {"families": ["Open+Sans:300,400,600,700"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['{{ asset('backend/css/fonts.css') }}']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/azzara.min.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('backend/css/demo.css') }}">
</head>
<body>
@include('sweetalert::alert')

<div class="wrapper">
    <!--
        Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
    -->
    <div class="main-header" data-background-color="purple">
        <!-- Logo Header -->
    @include('layouts.backend.logo_header')
    <!-- End Logo Header -->

        <!-- Navbar Header -->
    @include('layouts.backend.navbar')
    <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    @include('layouts.backend.sidebars')
    <!-- End Sidebar -->

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">&nbsp;</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Base</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Typography</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        {{--        @yield('breadcrumb')--}}
                            @yield('content')
                            @include('layouts.backend.footer')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('backend/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('backend/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('backend/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- Moment JS -->
<script src="{{ asset('backend/js/plugin/moment/moment.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('backend/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('backend/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('backend/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('backend/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('backend/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- Bootstrap Toggle -->
{{--<script src="{{ asset('backend/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>--}}

<!-- jQuery Vector Maps -->
<script src="{{ asset('backend/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

<!-- Dropzone -->
<script src="{{ asset('backend/js/plugin/dropzone/dropzone.min.js') }}"></script>

<!-- Fullcalendar -->
<script src="{{ asset('backend/js/plugin/fullcalendar/fullcalendar.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('backend/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- DateTimePicker -->
<script src="{{ asset('backend/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Bootstrap Tagsinput -->
<script src="{{ asset('backend/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>

<!-- Bootstrap Wizard -->
<script src="{{ asset('backend/js/plugin/bootstrap-wizard/bootstrapwizard.js') }}"></script>

<!-- jQuery Validation -->
<script src="{{ asset('backend/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

<script src="{{ asset('backend/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Azzara JS -->
<script src="{{ asset('backend/js/ready.min.js') }}"></script>
@yield('inline_scripts')
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script>
    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
    var notifications          = notificationsWrapper.find('li.pusher');
    
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    
    var pusher = new Pusher('1608558ccb79baab7db8', {
        cluster: 'ap1'
    });
    var icon = <?php echo json_encode(\App\Models\Notification::ICON_TYPE)?>;
        console.log();
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        $('#notification').html(parseInt($('#notification').html()) + 1);
        $('#count').html(parseInt($('#count').html()) + 1);
        var existingNotifications = notifications.html();
        var newNotificationHtml = `
        <div class="notif-scroll scrollbar-outer">
            <div class="notif-center">
            <a href="`+data.message.url+`">`
            + icon[data.message.type] +
            `<div class="notif-content">
            <span class="block">
            `+data.message.title+`
            </span>
            <span class="time">`+data.message.created_at+`</span>
            </div>
            </a>
            </div>
            </div>
    `;
        notifications.html(newNotificationHtml + existingNotifications);
    });
</script>
</body>
</html>
