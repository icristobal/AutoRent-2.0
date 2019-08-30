<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials-usr.head')
</head>

<body class="d-flex flex-column h-100 pt-150">

@if(Auth::check() && auth()->user()->usertype == 1)
    @include('layouts.partials-usr.nav')
@else
	@include('layouts.partials-usr.welcome-nav')
@endif

<main role="main" class="flex-shrink-0">
    @yield('content')
</main>
    @include('layouts.partials-usr.footer')
</body>

</html>
