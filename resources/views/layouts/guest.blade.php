<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="flex flex-col items-center justify-center pt-6">
        <div class="logo-container d-flex align-items-center justify-content-center mb-4">
            <a href="/">
                <img src="{{ asset('img/TOX.png') }}" alt="Logo" class="login-logo">
            </a>
        </div>
        <div class="mt-6 px-6 py-4">
            {{ $slot }}
        </div>
    </div>
    </div>
</body>

</html>
