@php
$user = auth()->user();
@endphp

<div class="page-wrap">
    <div class="app-sidebar">
        <div class="sidebar-header" style="background-color:white;">
            <a class="header-brand" href="#">
                <div class="logo-img">
                    <img src="{{ asset('template/src/img/fpts.png')}}" class="header-brand-img" style="width: 35px; height: auto;">
                </div>
                <span class="text" style="font-size: 15px;color: black;">&nbsp; FYP Tracker System</span>
            </a>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-item active">
                        <a href="{{ url('dashboard') }}"><i class="ik ik-home"></i><span>Dashboard</span></a>
                    </div>

                    @if($user->role_id === 1)
                    <!-- Show "Users" navigation only if role_id is 1 -->
                    <div class="nav-item has-sub">
                        <a href="#"><i class="fas fa-solid fa-users"></i><span>Users</span></a>
                        <div class="submenu-content">
                            <a href="{{ route('ListStudent') }}" class="menu-item">All Students</a>
                          <a href="{{ route('ListUser') }}" class="menu-item">All Supervisor</a>
                        </div>
                    </div>
                    @endif

                    @if($user->role_id === 2)
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-check"></i><span>Availability</span></a>
                        <div class="submenu-content">
                            <a href="{{ route('indexAvailability') }}" class="menu-item">List</a>
                            <a href="{{ route('createAvailability') }}" class="menu-item">Create</a>
                        </div>
                    </div>
                    @endif

                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-calendar"></i><span>Appointment</span></a>
                        <div class="submenu-content">
                            <!-- Show "Index" submenu item for role_id=2 and role_id=3 -->
                            <a href="{{ route('indexAppointment') }}" class="menu-item">Index</a>

                            <!-- Show "Create" submenu item only for role_id=3 -->
                            @if($user->role_id === 3)
                            <a href="{{ route('AddAppointment') }}" class="menu-item">Create</a>
                            @endif

                        </div>
                    </div>


                    @if($user->role_id !== 1)
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-navigation"></i><span>Feedback</span></a>
                        <div class="submenu-content">
                            <!-- Show "Create" submenu item only if role_id is 2 -->
                            @if($user->role_id === 2)
                            <a href="{{ route('AddFeedback') }}" class="menu-item">Create</a>
                            @endif

                            <!-- Show "List" submenu item to roles 2 and 3 -->
                            @if($user->role_id === 2 || $user->role_id === 3)
                            <a href="{{ route('ListFeedback') }}" class="menu-item">List</a>
                            @endif
                        </div>
                    </div>
                    @endif


                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-clipboard"></i><span>Report</span></a>
                        <div class="submenu-content">
                            @if($user->role_id === 2)
                            <a href="{{ route('addReport') }}" class="menu-item">Create</a>
                            @endif
                            <a href="{{ route('ListReport') }}" class="menu-item">List</a>
                        </div>
                    </div>

                </nav>
            </div>
        </div>

    </div>