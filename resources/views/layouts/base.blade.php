<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'CashTracker') }} - @yield('title')</title>

        @fonts

        <link href="https://api.fontshare.com/v2/css?f[]=satoshi@900,700,500,300,400&display=swap" rel="stylesheet">
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>


<body>

    <header class="bg-black p-5">
        <div class="max-w-6xl mx-auto flex flex-col lg:flex-row items-center lg:justify-between">
            <div class="w-full max-w-100">
                <img src="{{ asset('img/logo2.svg') }}" alt="Cash Tracker logo" class="w-full block">
            </div>

            @if (Route::has('login'))

            <nav class="flex flex-col lg:flex-row items-center gap-4">
                <a href="{{ route('login') }}"
                class="text-white font-bold uppercase p-2">Login</a>

                <a href="{{ route('register') }}"
                class=" border-2 px-5 py-2 border-amber-500 text-amber-500 font-bold uppercase">Register</a>
            </nav>
            @endif

        </div>
    </header>


    @yield('contents')
</body>

</html>
