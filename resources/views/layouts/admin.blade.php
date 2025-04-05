<x-app-layout>
    <div class="h-screen flex bg-surface dark:bg-surface-dark overflow-hidden">
        @include('admin.layouts.navigation.sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col h-screen w-full overflow-hidden">
            @include('admin.layouts.navigation.topbar')

            <main class="flex-1 py-4 overflow-y-auto md:border-l border-t border-outline dark:border-outline-dark">
                @isset($header)
                    <header class="shadow mb-6 rounded-md">
                        <div class="max-w-full mx-auto py-6 px-4">
                            {{ $header }}
                        </div>
                    </header>
                @endisset
                @isset($linkTo)
                    <div class="flex justify-end items-center px-4">
                        <x-button variant="primary" href="{{ $linkTo }}">
                            <span class="material-symbols-outlined small-icon"> add </span>
                            <span>Create New</span>
                        </x-button>
                    </div>
                @endisset

                {{ $slot }}
            </main>
        </div>
    </div>
</x-app-layout>
