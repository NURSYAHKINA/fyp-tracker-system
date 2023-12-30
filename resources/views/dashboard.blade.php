<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FYP Progress Tracker</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('template/src/img/brand.svg')}}" type="image/x-icon" />


    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css" media="print">
    <link rel="stylesheet" href="{{asset('template/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/icon-kit/dist/css/iconkit.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/ionicons/dist/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/weather-icons/css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/c3/c3.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/plugins/owl.carousel/dist/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/css/theme.min.css')}}">
    <script src="{{asset('template/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <div class="header-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                            </div>
                        </div>
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
                            <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                                <h4 class="header">Notifications</h4>
                                <div class="notifications-wrap">
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <i class="ik ik-check"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">Invitation accepted</span>
                                            <span class="media-content">Your have been Invited ...</span>
                                        </span>
                                    </a>
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">Steve Smith</span>
                                            <span class="media-content">I slowly updated projects</span>
                                        </span>
                                    </a>
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <i class="ik ik-calendar"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">To Do</span>
                                            <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                            </div>
                        </div>
                        <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i class="ik ik-message-square"></i><span class="badge bg-success">3</span></button>

                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{asset('template/img/user.jpg')}}" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="ik ik-power dropdown-icon"></i>{{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                             </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="#">
                        <div class="logo-img">
                            <img src="{{ asset('template/src/img/brand.svg')}}" class="header-brand-img" alt="lavalite">
                        </div>
                        <span class="text">FPTS</span>
                    </a>
                    <!--<button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>-->
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>

                <div class="sidebar-content">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">
                            <div class="nav-item active">
                                <a href="{{ url('dashboard') }}"><i class="ik ik-home"></i><span>Dashboard</span></a>
                            </div>

                            <div class="nav-item has-sub">
                                <a href="#"><i class="ik ik-check"></i><span>Availability</span></a>
                                <div class="submenu-content">
                                    <a href="{{ route('createAvailability') }}" class="menu-item">Create</a>
                                    <a href="pages/widget-statistic.html" class="menu-item">List</a>
                                </div>
                            </div>

                            <div class="nav-item has-sub">
                                <a href="#"><i class="ik ik-calendar"></i><span>Appointment</span></a>
                                <div class="submenu-content">
                                    <a href="pages/widgets.html" class="menu-item">Create</a>
                                    <a href="pages/widget-statistic.html" class="menu-item">List</a>
                                </div>
                            </div>

                            <div class="nav-item has-sub">
                                <a href="#"><i class="ik ik-send"></i><span>Feedback</span></a>
                                <div class="submenu-content">
                                    <a href="pages/widgets.html" class="menu-item">Create</a>
                                    <a href="pages/widget-statistic.html" class="menu-item">List</a>
                                </div>
                            </div>

                            <div class="nav-item has-sub">
                                <a href="#"><i class="ik ik-clipboard"></i><span>Report</span></a>
                                <div class="submenu-content">
                                    <a href="pages/widgets.html" class="menu-item">Create</a>
                                    <a href="pages/widget-statistic.html" class="menu-item">List</a>
                                    <a href="pages/widget-statistic.html" class="menu-item">Generate Report</a>
                                </div>
                            </div>

                        </nav>
                    </div>
                </div>
            </div>

            <!--Content Page-->
            <div class="main-content">
                <div class="container-fluid">

                    <!--All Card-->
                    <div class="row clearfix">

                        <!--Supervisor Card-->
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Supervisor</h6>
                                            <h2>1,410</h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-user-check"></i>
                                        </div>
                                    </div>
                                    <small class="text-small mt-10 d-block">6% higher than last month</small>
                                </div>
                            </div>
                        </div>

                        <!--Student Card-->
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Student</h6>
                                            <h2>41,410</h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-user"></i>
                                        </div>
                                    </div>
                                    <small class="text-small mt-10 d-block">61% higher than last month</small>
                                </div>
                            </div>
                        </div>

                        <!--Feedback Card-->
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Feedback</h6>
                                            <h2>410</h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-send"></i>
                                        </div>
                                    </div>
                                    <small class="text-small mt-10 d-block">Total Events</small>
                                </div>
                            </div>
                        </div>

                        <!--Report Card-->
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Report</h6>
                                            <h2>41,410</h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-clipboard"></i>
                                        </div>
                                    </div>
                                    <small class="text-small mt-10 d-block">Total Comments</small>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--Calendar Card-->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-8 col-md-12">
                                            <h3 class="card-title">Calendar</h3>
                                            <div id="calendar" style="width:100%; height:350px"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Donut Chart-->
                        <div class="col-md-4">
                            <div class="card" style="min-height: 422px;">
                                <div class="card-header">
                                    <h3>Donut chart</h3>
                                </div>
                                <div class="card-body">
                                    <div id="c3-donut-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Footer-->
                </div>
                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-center d-md-inline-block">Copyright © 2023 FPTS. All Rights Reserved.</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by CB20162</span>
                    </div>
                </footer>

            </div>
        </div>


        <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="quick-search">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <div class="input-wrap">
                                        <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                        <i class="ik ik-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')
        </script>
        <script src="{{asset('template/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('template/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('template/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('template/plugins/screenfull/dist/screenfull.js')}}"></script>
        <script src="{{asset('template/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/plugins/jvectormap/jquery-jvectormap.min.js')}}"></script>
        <script src="{{asset('template/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script src="{{asset('template/plugins/moment/moment.js')}}"></script>
        <script src="{{asset('template/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <script src="{{asset('template/plugins/d3/dist/d3.min.js')}}"></script>
        <script src="{{asset('template/plugins/c3/c3.min.js')}}"></script>
        <script src="{{asset('template/js/tables.js')}}"></script>
        <script src="{{asset('template/js/widgets.js')}}"></script>
        <script src="{{asset('template/js/charts.js')}}"></script>
        <script src="{{asset('template/dist/js/theme.min.js')}}"></script>

        <script>
            (function(b, o, i, l, e, r) {
                b.GoogleAnalyticsObject = l;
                b[l] || (b[l] =
                    function() {
                        (b[l].q = b[l].q || []).push(arguments)
                    });
                b[l].l = +new Date;
                e = o.createElement(i);
                r = o.getElementsByTagName(i)[0];
                e.src = 'https://www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e, r)
            }(window, document, 'script', 'ga'));
            ga('create', 'UA-XXXXX-X', 'auto');
            ga('send', 'pageview');
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    plugins: ['interaction', 'dayGrid', 'timeGrid'],
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    select: function(arg) {
                        var title = prompt('Event Title:');
                        if (title) {
                            calendar.addEvent({
                                title: title,
                                start: arg.start
                            });
                        }
                        calendar.unselect();
                    },
                    editable: true,
                    eventLimit: true,
                    eventSources: [{
                        url: "{{ route('createAppointment') }}", // Replace with your route URL
                        method: 'GET',
                        failure: function() {
                            console.error('Error fetching events data.');
                        }
                    }],
                    eventSourceSuccess: function(content, xhr) {
                        var data = JSON.parse(content);
                        var events = data.map(eventData => ({
                            title: eventData.title,
                            start: eventData.start,
                            end: eventData.end,
                            backgroundColor: "#2596be",
                            borderColor: "#2596be",
                            textColor: "#000"
                        }));

                        return events;
                    },
                    loading: function(bool) {
                        if (bool) {
                            // Show loader or do any loading indicator operations
                        } else {
                            // Hide loader or perform any post-loading operations
                        }
                    }
                });

                calendar.render();
            });
        </script>
</body>

</html>