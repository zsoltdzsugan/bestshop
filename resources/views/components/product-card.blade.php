@props(['product'])
@php
    use Carbon\Carbon;

    $isOnSale = $product->sale_price &&
        (Carbon::parse($product->sale_start)->lessThanOrEqualTo(Carbon::today())
        && Carbon::today()->lessThanOrEqualTo(Carbon::parse($product->sale_end)));

    if ($isOnSale) {
        $percent = round((($product->price - $product->sale_price) / $product->price) * 100, 0);
    }
@endphp

<article class="group flex rounded-radius h-full flex-col overflow-hidden bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark">
    <x-link href="{{ route('product.show', $product->slug) }}">
    <!-- Image -->
    <div class="relative aspect-[4/3] overflow-hidden {{ $imageContainerClasses() }}">
        <img src="{{ asset('storage/'.$product->thumb_image) }}" class="w-full h-full object-cover object-center transition duration-700 ease-out group-hover:scale-105" alt="{{ $product->name }}" />
        {{-- TODO: to component --}}
        @if ($product->is_top)
            <div class="font-bold group-hover:opacity-0 transition-all duration-300 ease-in-out absolute max-w-12 w-full top-2 left-2 p-1.5 bg-primary dark:bg-primary-dark text-on-primary dark:text-on-primary-dark flex items-center justify-center text-center">Top</div>
        @endif
        @if ($product->is_new)
            <div class="font-bold group-hover:opacity-0 transition-all duration-300 ease-in-out absolute max-w-12 w-full {{ $product->is_top ? 'top-12' : 'top-2' }} left-2 p-1.5 bg-primary dark:bg-primary-dark text-on-primary dark:text-on-primary-dark flex items-center justify-center text-center">New</div>
        @endif
        @if ($isOnSale)
            <div class="font-bold group-hover:opacity-0 transition-all duration-300 ease-in-out absolute max-w-12 w-full top-2 right-2 p-1.5 bg-danger text-on-danger flex items-center justify-center text-center">-{{ $percent }}<span class="text-xs font-bold">%</span></div>
        @endif
    </div>
    </x-link>
    <!-- Content -->
    <div class="flex flex-col gap-4 {{ $contentContainerClasses }}">
        <!-- Header -->
        <div class="flex justify-between {{ $headerClasses }}">
            <!-- Title & Rating -->
            <div class="flex flex-col gap-1">
                <x-link href="{{ route('product.show', $product->slug) }}">
                    <h3 class="{{ $titleClasses() }} text-on-surface-strong dark:text-on-surface-dark-strong hover:text-primary dark:hover:text-primary-dark" aria-describedby="{{ $product->name }}">{{ $product->name }}</h3>
                </x-link>
                <!-- Rating -->
                <div class="flex items-center gap-1">
                    <span class="sr-only">Rated 3 stars</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-amber-500" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-amber-500" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-amber-500" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-on-surface/50 dark:text-on-surface-dark/50" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 text-on-surface/50 dark:text-on-surface-dark/50" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <!-- Price -->
            <div class="flex {{ $variant === 'default' ? 'flex-col' : 'flex-row items-center mt-4 gap-2' }}">
                <span class="text-xl text-on-surface-strong dark:text-on-surface-dark-strong"><span class="sr-only">Price</span>${{ $isOnSale ? $product->sale_price : $product->price }}</span>
                @if ($isOnSale)
                    <span class="text-md text-center text-danger brightness-75 line-through {{ $variant === 'default' ? '' : 'mt-0.5' }}"><span class="sr-only">Sale Price</span>${{ $product->price }}</span>
                @endif
            </div>
        </div>
        @if ($variant === 'default')
            <p id="productDescription" class="flex-end mb-2 text-pretty text-sm shrink-0 min-h-10 truncate overflow-ellipsis">{{ $product->short_description }}</p>
            <!-- Button -->
            <x-button type="button" class="flex items-center z-20">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" class="size-4">
                    <path fill-rule="evenodd" d="M5 4a3 3 0 0 1 6 0v1h.643a1.5 1.5 0 0 1 1.492 1.35l.7 7A1.5 1.5 0 0 1 12.342 15H3.657a1.5 1.5 0 0 1-1.492-1.65l.7-7A1.5 1.5 0 0 1 4.357 5H5V4Zm4.5 0v1h-3V4a1.5 1.5 0 0 1 3 0Zm-3 3.75a.75.75 0 0 0-1.5 0v1a3 3 0 1 0 6 0v-1a.75.75 0 0 0-1.5 0v1a1.5 1.5 0 1 1-3 0v-1Z" clip-rule="evenodd" />
                </svg>
                <p class="mt-0.5">Add to Cart</p>
            </x-button>
        @endif
    </div>
</article>
