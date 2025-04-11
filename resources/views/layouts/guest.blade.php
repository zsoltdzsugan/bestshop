<!DOCTYPE html>
<html  data-theme="industrial" lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Inline script to detect system dark mode preference and apply it immediately --}}
        <script>
            (function() {
                const appearance = '{{ $appearance ?? "system" }}';

                if (appearance === 'system') {
                    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                    if (prefersDark) {
                        document.documentElement.classList.add('dark');
                    }
                }
            })();
        </script>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/a6bb007fc2.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen max-w-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-surface dark:bg-surface-dark text-on-surface dark:text-on-surface-dark">
            <div>
                <!-- Brand Logo -->
                <a href="#" class="text-on-surface dark:text-on-surface-dark rounded-radius">
                    <div class="flex gap-2 px-2 py-1 items-center">
                        <svg class="size-20 fill-primary dark:fill-primary-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M168.5 72L256 165l87.5-93-175 0zM383.9 99.1L311.5 176l129 0L383.9 99.1zm50 124.9L256 224 78.1 224 256 420.3 433.9 224zM71.5 176l129 0L128.1 99.1 71.5 176zm434.3 40.1l-232 256c-4.5 5-11 7.9-17.8 7.9s-13.2-2.9-17.8-7.9l-232-256c-7.7-8.5-8.3-21.2-1.5-30.4l112-152c4.5-6.1 11.7-9.8 19.3-9.8l240 0c7.6 0 14.8 3.6 19.3 9.8l112 152c6.8 9.2 6.1 21.9-1.5 30.4z"/></svg>
                        <div>
                            <p class="font-bold text-3xl text-primary dark:text-primary-dark">BestShop</p>
                            <p class="text-md text-right text-primary dark:text-primary-dark">eCommerce</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-radius">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
