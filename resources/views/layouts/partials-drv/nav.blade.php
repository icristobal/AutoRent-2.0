<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
            <div class="sidebar-brand-text mx-3"><img src="{{URL::asset('img/icon.png') }}" width="50px" height="40px"><br>Driver Portal</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item @yield('home-link')">
            <a class="nav-link" href="{{ url('driver/home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>My Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Actions
        </div>
        <li class="nav-item @yield('car-manage-link')">
            <a class="nav-link" href="{{ url('driver/my-cars') }}">
                <i class="fas fa-car"></i>
                <span>My Cars</span></a>
        </li>
        <li class="nav-item @yield('ad-manage-link')">
            <a class="nav-link" href="{{ url('driver/my-listings') }}">
                <i class="fas fa-car"></i>
                <span>My Listing</span></a>
        </li>
        <li class="nav-item @yield('job-manage-link')">
            <a class="nav-link" href="{{ url('driver/my-jobs') }}">
                <i class="fas fa-list"></i>
                <span>My Jobs</span></a>
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
                            <img class="img-profile rounded-circle" 
                                @if(Auth::user()->display_image != null)
                                src="data:image/png;base64,{{ chunk_split(base64_encode(Auth::user()->display_image)) }}"
                                @else
                                src="https://i.stack.imgur.com/34AD2.jpg"
                                @endif
                            >
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ url('driver/my-profile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                My Profile
                            </a>
                            <a class="dropdown-item" href="{{ url('driver/my-transactions') }}">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Transaction History
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
