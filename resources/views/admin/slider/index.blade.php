<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Slider') }}
        </h2>
    </x-slot>

    <div class="flex justify-end items-center">
        <x-primary-button :href="route('admin.slider.create')">
            <span class="material-symbols-outlined small-icon"> add </span>
            <span>Create New</span>
        </x-primary-button>
    </div>

    <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-outline dark:border-outline-dark">
        <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
            <thead class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                <tr>
                    <th scope="col" class="p-4">CustomerID</th>
                    <th scope="col" class="p-4">Name</th>
                    <th scope="col" class="p-4">Email</th>
                    <th scope="col" class="p-4">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline dark:divide-outline-dark">
                    <tr>
                        <td class="p-4">2335</td>
                        <td class="p-4">Alice Brown</td>
                        <td class="p-4">alice.brown@gmail.com</td>
                        <td class="p-4"><button type="button" class="whitespace-nowrap rounded-radius bg-transparent p-0.5 font-semibold text-primary outline-primary hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-primary-dark dark:outline-primary-dark">Edit</button></td>
                    </tr>
                    <tr>
                        <td class="p-4">2338</td>
                        <td class="p-4">Bob Johnson</td>
                        <td class="p-4">johnson.bob@outlook.com</td>
                        <td class="p-4"><button type="button" class="whitespace-nowrap rounded-radius bg-transparent p-0.5 font-semibold text-primary outline-primary hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-primary-dark dark:outline-primary-dark">Edit</button></td>
                    </tr>
                    <tr>
                        <td class="p-4">2342</td>
                        <td class="p-4">Sarah Adams</td>
                        <td class="p-4">s.adams@gmail.com</td>
                        <td class="p-4"><button type="button" class="whitespace-nowrap rounded-radius bg-transparent p-0.5 font-semibold text-primary outline-primary hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-primary-dark dark:outline-primary-dark">Edit</button></td>
                    </tr>
            </tbody>
        </table>
    </div>
</x-admin-layout>
