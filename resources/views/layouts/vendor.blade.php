<x-app-layout>
    <div class="min-h-screen flex bg-surface dark:bg-surface-dark">
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
<x-app-layout>
