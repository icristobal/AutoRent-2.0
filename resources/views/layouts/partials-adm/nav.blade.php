<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
            <div class="sidebar-brand-text mx-3"><img src="{{URL::asset('img/icon.png') }}" width="50px" height="40px"><br>Admin Portal</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item @yield('home-link')">
            <a class="nav-link" href="{{ url('admin/home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>My Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Actions
        </div>
        <li class="nav-item @yield('announcements-link')">
            <a class="nav-link" href="{{ route('announcements.index') }}">
                <i class="fas fa-car"></i>
                <span>Add Announcements</span></a>
        </li>
        <li class="nav-item @yield('verification-link')">
                <a class="nav-link" href="{{ route('verification.index') }}">
                    <i class="fas fa-car"></i>
                    <span>Verify Driver Vehicles</span></a>
            </li>
    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand bg-dark topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
