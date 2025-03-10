<x-public-layout>
    <div class="flex flex-col space-y-12">
        @include('user.layouts.navigation')

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-full">
                @include('user.profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-full">
                @include('user.profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('user.profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-public-layout>
