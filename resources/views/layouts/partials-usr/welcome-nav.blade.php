<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-1 font-weight-bold">
    <a class="navbar-brand mr-5" href="{{ url('/') }}"><img src="{{URL::asset('img/icon.png') }}" width="80px" height="60px"> AutoRent</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto black">
            <li class="nav-item @yield("home")">
                <a class="nav-link" href="{{ url('/') }}"></i> <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item @yield("abtus")">
                <a class="nav-link" href="{{ url('/about-us') }}"><i class="fa fa-info-circle"></i> About Us</a>
            </li>
            <li class="nav-item @yield("findcar")">
                <a class="nav-link" href="{{ url('/findcar') }}"><i class="fa fa-car"></i> Find a Car</a>
            </li>
            <li class="nav-item @yield("contact")">
                <a class="nav-link" href="{{ url('/contact-us') }}"><i class="fa fa-id-card"></i> Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item @yield("drv")">
                <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user"></i> Register</a>
            </li>
            <li class="nav-item @yield("login")">
                <a class="nav-link" href="{{ url('/login') }}"><i class="fa fa-sign-in-alt"></i> Login</a>
            </li>
        </ul>
    </div>
</nav>

