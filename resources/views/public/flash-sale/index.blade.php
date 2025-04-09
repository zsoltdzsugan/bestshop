<x-public-layout>
    @slot('header')
        <div class="w-full flex items-center justify-between px-12">
            <h2 class="font-semibold text-2xl leading-tight">
                {{ __('Flash Sale') }}
            </h2>
            <div>
                <div class="flex py-6 w-full">
                    <div class="flex justify-center items-center gap-1">
                        <p class="remaining-day text-3xl text-pretty min-w-10 w-full text-center"><p>
                        <p class="text-xs mt-0.5 text-pretty uppercase text-center">days</p>
                    </div>
                    <div class="border-r border-outline dark:border-outline-dark mx-2"></div>
                    <div class="flex justify-center items-center gap-1">
                        <p class="remaining-hour text-3xl text-pretty min-w-10 w-full text-center"><p>
                        <p class="text-xs mt-0.5 text-pretty uppercase text-center">hours</p>
                    </div>
                    <div class="border-r border-outline dark:border-outline-dark mx-2"></div>
                    <div class="flex justify-center items-center gap-1">
                        <p class="remaining-minute text-3xl text-pretty min-w-10 w-full text-center"><p>
                        <p class="text-xs mt-0.5 text-pretty uppercase text-center">minutes</p>
                    </div>
                    <div class="border-r border-outline dark:border-outline-dark mx-2"></div>
                    <div class="flex justify-center items-center gap-1">
                        <p class="remaining-second text-3xl text-pretty min-w-10 w-full text-center"><p>
                        <p class="text-xs  mt-0.5 text-pretty uppercase text-center">seconds</p>
                    </div>
                </div>
            </div>
        </div>
    @endslot
    <div class="flex flex-col w-full justify-between gap-2">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">
            @foreach ($flashSaleProducts as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
        <div class="py-4">
            {{ $flashSaleProducts->links('components.pagination') }}
        </div>
    </div>
    @push('scripts')
        <script src="/js/flashSaleCountdown.js"></script>
        <script>
            const targetDate = new Date("<?= $flashSaleEnd->sale_end ?>");
            startCountdown(targetDate);
        </script>
    @endpush
</x-public-layout>
