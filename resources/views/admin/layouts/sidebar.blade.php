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
                                    <a href="{{ route('createAvailability') }}" class="menu-item">List</a>
                                </div>
                            </div>

                            <div class="nav-item has-sub">
                                <a href="#"><i class="ik ik-calendar"></i><span>Appointment</span></a>
                                <div class="submenu-content">
                                    <a href="{{ route('createAppointment') }}" class="menu-item">Create</a>
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