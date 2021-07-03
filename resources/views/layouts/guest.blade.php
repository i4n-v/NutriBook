<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('img/icons/icon.svg') }}" type="image/x-icon">

        <title>{{ config('app.name', 'NutriBook') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="relative">
        <div class="bg-white">
            @if (isset($header))
                @include('layouts.navigation-home')

                <!-- Page Heading -->
                <header class="w-full pl-16 mt-7 -mb-10">
                       {{ $header }}
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @if (isset($header))
            @include('layouts.footer')
        @endif
    </body>
</html>
