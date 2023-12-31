<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <!-- In order to prevent digital ocean to complain about insecurities -->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    {{-- needed for toggles in navigations to work --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>


    <!-- Scripts -->
    @yield('head')
    @vite('resources/css/app.css')
</head>

<body>
<div id="app">
    <header>
        @include('partials.nav')
    </header>

    <main>
        @yield('content')
    </main>
</div>
</body>

@yield('scripts')
</html>
