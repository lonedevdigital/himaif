<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login Admin - HIMA IF</title>
        <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,600,800&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-red-900 to-red-800">
            <div>
                <a href="/">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo HIMA" style="width: 100px; height: auto;" class="mx-auto drop-shadow-xl hover:scale-105 transition duration-300">
                </a>
                <h2 class="text-center font-black text-2xl text-yellow-400 mt-4 tracking-tight drop-shadow-sm">
                    PORTAL ADMIN <br>HIMA INFORMATIKA
                </h2>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-2xl shadow-black/50 overflow-hidden sm:rounded-2xl border-t-4 border-yellow-500">
                {{ $slot }}
            </div>
            
            <p class="mt-8 text-xs font-bold text-red-200 uppercase tracking-widest">© {{ date('Y') }} Universitas Teknokrat Indonesia</p>
        </div>
    </body>
</html>