<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MoneyMind') }}</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/moneymindicon.png') }}" type="image/png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('js/particles.js') }}"></script>
        <script src="{{ asset('js/floating-elements.js') }}"></script>
        <script src="{{ asset('js/typing-animation.js') }}"></script>
    </head>
    <body class="font-sans antialiased">
        <canvas id="particles-canvas"></canvas>
        <div class="login-container">
            <div class="logo-container">
                <a href="/">
                    <x-application-logo />
                </a>
            </div>

            <div class="login-card">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
