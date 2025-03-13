@props([
    'name' => 'switch',
    'id' => null,
    'status' => 0,
])

<div x-data="{ switchOn: {{ $status ? 'true' : 'false' }} }" class="flex items-center justify-center space-x-2">
    <input type="hidden" name="{{ $name }}" x-model="switchOn">

    <button
        type="button"
        @click="switchOn = !switchOn"
        :class="switchOn ? 'bg-green-600' : 'bg-neutral-200'"
        class="relative inline-flex h-6 py-0.5 ml-4 focus:outline-none rounded-full w-10">

        <span
            :class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'"
            class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md">
        </span>
    </button>
</div>

