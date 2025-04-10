@php
    use Carbon\Carbon;

    $isOnSale = $product->sale_price &&
        (Carbon::parse($product->sale_start)->lessThanOrEqualTo(Carbon::today())
        && Carbon::today()->lessThanOrEqualTo(Carbon::parse($product->sale_end)));

    if ($isOnSale) {
        $percent = round((($product->price - $product->sale_price) / $product->price) * 100, 0);
    }
@endphp
<x-public-layout>
    @slot('header')
        <div class="w-full flex items-center justify-between px-12">
            <h2 class="font-semibold text-2xl leading-tight">
                {{ $product->name }}
            </h2>
    @endslot
    <div class="flex flex-col w-full justify-between gap-2">
        <div class="grid grid-cols-1 md:grid-cols-[1fr_2fr] gap-8">
            <div class="flex flex-col aspect-square max-w-md h-auto">
                @if ($product->video_link)
                    <a href="{{ $product->video_link }}">Play</a>
                @endif
                <div class="relative">
                    <x-image-modal :image="$product->thumb_image" :images="$product->images"/>
                    @if ($product->images->count() > 0)
                        <span class="text-xs absolute bottom-2 right-2 py-1.5 px-2 bg-secondary dark:bg-secondary-dark rounded-radius">{{ $product->images->count() }} more image</span>
                    @endif
                </div>

            </div>
            <div class="flex flex-col items-start">
                <h3>{{ $product->name }}</h3>
                <div class="flex">
                    @if ($product->quantity > 0)
                        <span>In Stock</span><span>({{ $product->quantity }}) item</span>
                    @else
                        <span>Out Of Stock</span>
                    @endif
                </div>
                <div class="flex">
                    @if ($isOnSale)
                        <span>$</span><p>{{ $product->sale_price }}</p>
                        <span>$</span><p class="line-through">{{ $product->price }}</p>
                    @else
                        <span>$</span><p>{{ $product->price }}</p>
                    @endif
                </div>
                <div class="review">Stars | Review</div>
                <div class="offer">Sale ends in: </div>
                <div class="colors flex gap-2">Colors:
                    <div class="flex gap-2">
                        <div class="flex items-center justify-start gap-2 font-medium text-on-surface has-disabled:opacity-75 dark:text-on-surface-dark">
                            <input id="radioPrimary" type="radio" class="relative h-6 w-6 appearance-none rounded-radius bg-red-500 checked:outline-2 checked:outline-offset-2 focus:outline-2 focus:outline-offset-2 focus:outline-outline-strong checked:outline-red-500 checked:focus:outline-red-500 disabled:cursor-not-allowed" value="" checked>
                        </div>
                        <div class="flex items-center justify-start gap-2 font-medium text-on-surface has-disabled:opacity-75 dark:text-on-surface-dark">
                            <input id="radioPrimary" type="radio" class="relative h-6 w-6 appearance-none rounded-radius bg-surface-alt checked:bg-blue-500 focus:outline-2 focus:outline-offset-2 focus:outline-outline-strong checked:focus:outline-blue-500 disabled:cursor-not-allowed dark:bg-surface-dark-alt dark:checked:bg-blue-700 dark:focus:outline-outline-dark-strong dark:checked:focus:outline-blue-700" value="" checked >
                        </div>
                        <div class="flex items-center justify-start gap-2 font-medium text-on-surface has-disabled:opacity-75 dark:text-on-surface-dark">
                            <input id="radioPrimary" type="radio" class="relative h-6 w-6 appearance-none rounded-radius bg-cyan-500 focus:outline-2 focus:outline-offset-2 focus:outline-outline-strong checked:focus:outline-cyan-500 disabled:cursor-not-allowed dark:bg-cyan-500 dark:focus:outline-outline-dark-strong dark:checked:focus:outline-cyan-500 checked:outline-cyan-500" value="" checked>
                        </div>
                    </div>
                </div>
                <div class="colors">Size:
                </div>
                <div class="colors">
                    <div x-data="{ currentVal: 1, minVal: 0, maxVal: 10, decimalPoints: 0, incrementAmount: 1 }" class="flex flex-col gap-1">
                        <label for="counterInput" class="pl-1 text-sm text-on-surface dark:text-on-surface-dark">Quantity</label>
                        <div x-on:dblclick.prevent class="flex items-center">
                            <button x-on:click="currentVal = Math.max(minVal, currentVal - incrementAmount)" class="flex h-10 items-center justify-center rounded-l-radius bg-surface-alt px-4 py-2 text-on-surface hover:opacity-75 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-surface-dark-alt dark:text-on-surface-dark dark:focus-visible:outline-primary-dark" aria-label="subtract">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15"/>
                                </svg>
                            </button>
                            <input x-model="currentVal.toFixed(decimalPoints)" id="counterInput" type="text" class="border-x-none h-10 w-20 rounded-none bg-surface-alt/50 text-center text-on-surface-strong focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-primary dark:bg-surface-dark-alt/50 dark:text-on-surface-dark-strong dark:focus-visible:outline-primary-dark" readonly />
                            <button x-on:click="currentVal = Math.min(maxVal, currentVal + incrementAmount)" class="flex h-10 items-center justify-center rounded-r-radius bg-surface-alt px-4 py-2 text-on-surface hover:opacity-75 focus-visible:z-10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-surface-dark-alt dark:text-on-surface-dark dark:focus-visible:outline-primary-dark" aria-label="add">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="2" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>

                <div class="buttons">
                    <x-button variant="primary" size="sm">Add To Cart</x-button>
                    <x-outline-button variant="primary" size="sm">Buy Now</x-button>
                </div>
            </div>
        </div>
    </div>
    <div>
    </div<div x-data="{ selectedTab: 'description' }" class="w-full">
	<div x-on:keydown.right.prevent="$focus.wrap().next()" x-on:keydown.left.prevent="$focus.wrap().previous()" class="flex gap-2 overflow-x-auto border-b border-outline dark:border-outline-dark" role="tablist" aria-label="tab options">
		<button x-on:click="selectedTab = 'description'" x-bind:aria-selected="selectedTab === 'description'" x-bind:tabindex="selectedTab === 'description' ? '0' : '-1'" x-bind:class="selectedTab === 'description' ? 'font-bold text-primary border-b-2 border-primary dark:border-primary-dark dark:text-primary-dark' : 'text-on-surface font-medium dark:text-on-surface-dark dark:hover:border-b-outline-dark-strong dark:hover:text-on-surface-dark-strong hover:border-b-2 hover:border-b-outline-strong hover:text-on-surface-strong'" class="flex h-min items-center gap-2 px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelDescription" >
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-4">
				<path d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z" />
			</svg>
			Description
		</button>
		<button x-on:click="selectedTab = 'likes'" x-bind:aria-selected="selectedTab === 'likes'" x-bind:tabindex="selectedTab === 'likes' ? '0' : '-1'" x-bind:class="selectedTab === 'likes' ? 'font-bold text-primary border-b-2 border-primary dark:border-primary-dark dark:text-primary-dark' : 'text-on-surface font-medium dark:text-on-surface-dark dark:hover:border-b-outline-dark-strong dark:hover:text-on-surface-dark-strong hover:border-b-2 hover:border-b-outline-strong hover:text-on-surface-strong'" class="flex h-min items-center gap-2 px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelLikes" >
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-4">
				<path d="m9.653 16.915-.005-.003-.019-.01a20.759 20.759 0 0 1-1.162-.682 22.045 22.045 0 0 1-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 0 1 8-2.828A4.5 4.5 0 0 1 18 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 0 1-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 0 1-.69.001l-.002-.001Z" />
			</svg>
			Likes
		</button>
		<button x-on:click="selectedTab = 'comments'" x-bind:aria-selected="selectedTab === 'comments'" x-bind:tabindex="selectedTab === 'comments' ? '0' : '-1'" x-bind:class="selectedTab === 'comments' ? 'font-bold text-primary border-b-2 border-primary dark:border-primary-dark dark:text-primary-dark' : 'text-on-surface font-medium dark:text-on-surface-dark dark:hover:border-b-outline-dark-strong dark:hover:text-on-surface-dark-strong hover:border-b-2 hover:border-b-outline-strong hover:text-on-surface-strong'" class="flex h-min items-center gap-2 px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelComments" >
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-4">
				<path d="M3.505 2.365A41.369 41.369 0 0 1 9 2c1.863 0 3.697.124 5.495.365 1.247.167 2.18 1.108 2.435 2.268a4.45 4.45 0 0 0-.577-.069 43.141 43.141 0 0 0-4.706 0C9.229 4.696 7.5 6.727 7.5 8.998v2.24c0 1.413.67 2.735 1.76 3.562l-2.98 2.98A.75.75 0 0 1 5 17.25v-3.443c-.501-.048-1-.106-1.495-.172C2.033 13.438 1 12.162 1 10.72V5.28c0-1.441 1.033-2.717 2.505-2.914Z" />
				<path d="M14 6c-.762 0-1.52.02-2.271.062C10.157 6.148 9 7.472 9 8.998v2.24c0 1.519 1.147 2.839 2.71 2.935.214.013.428.024.642.034.2.009.385.09.518.224l2.35 2.35a.75.75 0 0 0 1.28-.531v-2.07c1.453-.195 2.5-1.463 2.5-2.915V8.998c0-1.526-1.157-2.85-2.729-2.936A41.645 41.645 0 0 0 14 6Z" />
			</svg>
			Comments
		</button>
		<button x-on:click="selectedTab = 'reviews'" x-bind:aria-selected="selectedTab === 'reviews'" x-bind:tabindex="selectedTab === 'reviews' ? '0' : '-1'" x-bind:class="selectedTab === 'reviews' ? 'font-bold text-primary border-b-2 border-primary dark:border-primary-dark dark:text-primary-dark' : 'text-on-surface font-medium dark:text-on-surface-dark dark:hover:border-b-outline-dark-strong dark:hover:text-on-surface-dark-strong hover:border-b-2 hover:border-b-outline-strong hover:text-on-surface-strong'" class="flex h-min items-center gap-2 px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelSaved" >
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="size-4">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M10 2c-1.716 0-3.408.106-5.07.31C3.806 2.45 3 3.414 3 4.517V17.25a.75.75 0 0 0 1.075.676L10 15.082l5.925 2.844A.75.75 0 0 0 17 17.25V4.517c0-1.103-.806-2.068-1.93-2.207A41.403 41.403 0 0 0 10 2Z" />
			</svg>
			Reviews
		</button>
	</div>
	<div class="px-2 py-4 text-on-surface dark:text-on-surface-dark">
		<div x-cloak x-show="selectedTab === 'description'" id="tabpanelDescription" role="tabpanel" aria-label="description"><b><a href="#" class="underline">Description</a></b> tab is selected</div>
		<div x-cloak x-show="selectedTab === 'likes'" id="tabpanelLikes" role="tabpanel" aria-label="likes"><b><a href="#" class="underline">Likes</a></b> tab is selected</div>
		<div x-cloak x-show="selectedTab === 'comments'" id="tabpanelComments" role="tabpanel" aria-label="comments"><b><a href="#" class="underline">Comments</a></b> tab is selected</div>
		<div x-cloak x-show="selectedTab === 'reviews'" id="tabpanelReviews" role="tabpanel" aria-label="reviews"><b><a href="#" class="underline">Reviews</a></b> tab is selected</div>
	</div>
</div>
</x-public-layout>
