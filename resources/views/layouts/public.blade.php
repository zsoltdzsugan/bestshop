<x-app-layout>
    <div class="min-h-screen max-w-screen mx-auto rounded-radius text-on-surface dark:text-on-surface-dark">
        @include('public.layouts.search')
        @include('public.layouts.navigation')

        @isset($header)
            <header class="shadow rounded-radius my-12">
                <div class="max-w-7xl mx-auto bg-surface/25 dark:bg-surface-dark/25 border border-outline dark:border-outline-dark">
                    {{ $header }}
                </div>
            </header>
        @endisset
        <!-- Page Content -->
        <main class="max-w-7xl flex flex-col space-y-12 my-12 mx-auto">
            {{ $slot }}
        </main>
        @include('public.layouts.footer')
    </div>
</x-app-layout>
