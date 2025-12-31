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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-orange-100 via-white to-blue-200 relative overflow-hidden">
            <!-- Decorative blobs -->
            <div class="absolute top-0 left-0 w-96 h-96 bg-orange-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>

            <div class="relative z-10 w-full flex flex-col items-center">
                <div>
                    <a href="/" class="flex flex-col items-center group">
                        <!-- Custom Logo Text if no logo image -->
                        <h1 class="text-3xl font-bold font-montserrat tracking-tight text-secondary-900">
                            Ahmad <span class="text-accent-500">Farid</span>
                        </h1>
                        <p class="text-sm text-secondary-500 tracking-widest uppercase mt-1">Portfolio</p>
                    </a>
                </div>

                <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white/80 backdrop-blur-xl border border-white/50 shadow-2xl overflow-hidden sm:rounded-2xl transition-all hover:shadow-accent-500/10">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
