<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }} Driver Portal | @yield('pagename', 'Page')</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

<!-- Custom Scripts for all Pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}" defer></script>
<script src="{{ asset('js/drv-btn.js') }}"></script>