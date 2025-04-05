<x-app-layout>
    <div class="min-h-screen max-w-screen mx-auto rounded-radius">
        @include('public.layouts.search')
        @include('public.layouts.navigation')

        <!-- Page Content -->
        <main class="max-w-7xl flex flex-col space-y-12 my-12 mx-auto">
            {{ $slot }}
        </main>
        @include('public.layouts.footer')
    </div>
</x-app-layout>
