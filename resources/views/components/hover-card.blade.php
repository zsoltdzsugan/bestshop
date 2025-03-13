<div x-data="{
        hoverCardHovered: false,
        hoverCardDelay: 600,
        hoverCardLeaveDelay: 500,
        hoverCardTimout: null,
        hoverCardLeaveTimeout: null,
        hoverCardEnter () {
            clearTimeout(this.hoverCardLeaveTimeout);
            if(this.hoverCardHovered) return;
            clearTimeout(this.hoverCardTimout);
            this.hoverCardTimout = setTimeout(() => {
                this.hoverCardHovered = true;
            }, this.hoverCardDelay);
        },
        hoverCardLeave () {
            clearTimeout(this.hoverCardTimout);
            if(!this.hoverCardHovered) return;
            clearTimeout(this.hoverCardLeaveTimeout);
            this.hoverCardLeaveTimeout = setTimeout(() => {
                this.hoverCardHovered = false;
            }, this.hoverCardLeaveDelay);
        }
    }" class="relative" @mouseover="hoverCardEnter()" @mouseleave="hoverCardLeave()">

    <div class="flex place-items-center cursor-pointer">
        <span class="material-symbols-outlined information-icon">
            {{ $trigger }}
        </span>
    </div>

    <div x-show="hoverCardHovered" class="absolute top-0 w-[365px] max-w-lg mt-5 z-30 translate-x-1.5 translate-y-3 left-1/2" x-cloak>
        <div x-show="hoverCardHovered" class="w-full h-auto bg-white space-x-3 p-5 flex items-start rounded-md shadow-sm border border-neutral-200/70" x-transition>

            <!-- If an image is provided, display it -->
            @isset($image)
                <img src="{{ $image }}" alt="Profile Image" class="rounded-full w-14 h-14" />
            @endisset

            <div class="relative">
                <p class="mb-1 font-bold">
                    {{ $title }}
                </p>
                <p class="mb-1 text-md text-gray-600">
                    {{ $description }}
                </p>
                <p class="mb-1 text-sm text-gray-600">
                    Example: {{ $example }}
                </p>
            </div>
        </div>
    </div>
</div>
