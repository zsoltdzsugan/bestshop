<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="industrial" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/a6bb007fc2.js" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.datatables.net/fixedcolumns/4.x.x/js/dataTables.fixedColumns.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.x.x/css/fixedColumns.dataTables.min.css">
        <link href="https://cdn.datatables.net/2.2.2/css/dataTables.tailwindcss.css" rel="stylesheet" />
        @stack('styles')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="relative max-w-screen font-sans antialiased bg-surface-alt text-on-surface-alt dark:bg-surface-dark-alt dark:text-on-surface-dark-alt">
            <!-- Page Content -->
            {{ $slot }}

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.tailwindcss.com/3.4.16"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.tailwindcss.js"></script>
        <script src="https://cdn.tailwindcss.com/3.4.16"></script>
        @stack('scripts')
    </body>
</html>
