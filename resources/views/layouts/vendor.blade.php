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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark">
        <div class="min-h-screen flex">
            @include('vendor.layouts.navigation.sidebar')

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col min-h-screen w-full overflow-y-auto">
                @include('vendor.layouts.navigation.topbar')

                <main class="flex-1 p-4 overflow-y-auto">
                    @isset($header)
                        <header class="shadow mb-6 rounded-md">
                            <div class="max-w-full mx-auto py-6 px-4">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
