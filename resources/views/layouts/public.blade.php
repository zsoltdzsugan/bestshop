<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="industrial">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a6bb007fc2.js" crossorigin="anonymous"></script>
        @stack('styles')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="relative max-w-screen font-sans antialiased bg-surface-alt text-on-surface-alt dark:bg-surface-dark-alt dark:text-on-surface-dark-alt">
        <div class="min-h-screen mx-auto w-full rounded-radius">
            @include('public.layouts.search')
            @include('public.layouts.navigation')

            <!-- Page Content -->
            <main class="max-w-7xl flex flex-col space-y-12 my-12 mx-auto">
                {{ $slot }}
            </main>
            @include('public.layouts.footer')
        </div>
        @stack('scripts')
    </body>
</html>
