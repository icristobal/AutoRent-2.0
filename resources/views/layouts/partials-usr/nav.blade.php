<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-1 font-weight-bold">
    <a class="navbar-brand mr-5" href="{{ url('user/home') }}"><img src="{{URL::asset('img/icon.png') }}" width="80px" height="60px"> AutoRent</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @yield("home")">
                <a class="nav-link @yield("home-active")" href="{{ url('user/home') }}"></i> <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item @yield("abtus")">
                <a class="nav-link @yield("abtus-active")" href="{{ url('user/about-us') }}"><i class="fa fa-info-circle"></i> About Us</a>
            </li>
            <li class="nav-item @yield("findcar")">
                <a class="nav-link @yield("findcar-active")" href="{{ url('user/findcar') }}"><i class="fa fa-car"></i> Find a Car</a>
            </li>
            <li class="nav-item @yield("contact")">
                <a class="nav-link @yield("contact-active")" href="{{ url('user/contact-us') }}"><i class="fa fa-id-card"></i> Contact</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <img class="img-profile rounded-circle" 
                @if(Auth::user()->display_image != null)
                src="data:image/png;base64,{{ chunk_split(base64_encode(Auth::user()->display_image)) }}"
                @else
                src="https://i.stack.imgur.com/34AD2.jpg"
                @endif
            >
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}
                </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('user/my-profile') }}"><i class="fas fa-user"></i> My Profile</a>
            <a class="dropdown-item" href="{{ url('user/my-transactions') }}"><i class="fas fa-list"></i> My Transactions</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i> {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>