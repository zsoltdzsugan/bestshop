<x-vendor-layout>
    @php
        // Merge errors from different bags
        $allErrors = $errors->getBag('default')->all(); // Default bag is the global errors bag
        $allErrors = array_merge($allErrors, $errors->getBag('userDeletion')->all());
        $allErrors = array_merge($allErrors, $errors->getBag('updatePassword')->all());
    @endphp

    @if (count($allErrors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($allErrors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-6 max-w-[90%] mx-auto space-y-6">
        <div class="p-4 sm:p-8 bg-surface dark:bg-surface-dark shadow rounded-radius border border-outline dark:border-outline-dark">
            <div class="max-w-xl">
                @include('vendor.profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-surface dark:bg-surface-dark shadow rounded-radius border border-outline dark:border-outline-dark">
            <div class="max-w-xl">
                @include('vendor.profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-surface dark:bg-surface-dark shadow rounded-radius border border-outline dark:border-outline-dark">
            <div class="max-w-xl">
                @include('vendor.profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-vendor-layout>
