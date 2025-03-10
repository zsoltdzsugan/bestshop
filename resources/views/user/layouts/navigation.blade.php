<section id="dashboard">
    <div class="max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-8">
            <div class="bg-blue-500 rounded-md hover:scale-105 transition-transform duration-300 will-change-transform cursor-pointer">
                <div class="flex flex-col py-4 px-2 justify-center items-center gap-2">
                    <svg class="size-12 fill-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M48 0C21.5 0 0 21.5 0 48L0 368c0 26.5 21.5 48 48 48l16 0c0 53 43 96 96 96s96-43 96-96l128 0c0 53 43 96 96 96s96-43 96-96l32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64 0-32 0-18.7c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7L416 96l0-48c0-26.5-21.5-48-48-48L48 0zM416 160l50.7 0L544 237.3l0 18.7-128 0 0-96zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                    <p class="text-pretty text-lg font-extrabold text-gray-100 uppercase">Order</p>
                </div>
            </div>
            <div class="bg-green-500 rounded-md hover:scale-105 transition-transform duration-300 will-change-transform cursor-pointer">
                <div class="flex flex-col py-4 px-2 justify-center items-center gap-2">
                    <svg class="size-12 fill-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128l-368 0zm79-167l80 80c9.4 9.4 24.6 9.4 33.9 0l80-80c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-39 39L344 184c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 134.1-39-39c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9z"/></svg>

                    <p class="text-pretty text-lg font-extrabold text-gray-100 uppercase">Download</p>
                </div>
            </div>
            <div class="bg-yellow-500 rounded-md hover:scale-105 transition-transform duration-300 will-change-transform cursor-pointer">
                <div class="flex flex-col py-4 px-2 justify-center items-center gap-2">
                    <svg class="size-12 fill-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>

                    <p class="text-pretty text-lg font-extrabold text-gray-100 uppercase">Review</p>
                </div>
            </div>
            <div class="bg-orange-500 rounded-md hover:scale-105 transition-transform duration-300 will-change-transform cursor-pointer">
                <div class="flex flex-col py-4 px-2 justify-center items-center gap-2">
                    <svg class="size-12 fill-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>

                    <p class="text-pretty text-lg font-extrabold text-gray-100 uppercase">Whislist</p>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}" class="bg-indigo-500 rounded-md hover:scale-105 transition-transform duration-300 will-change-transform cursor-pointer">
                <div class="flex flex-col py-4 px-2 justify-center items-center gap-2">
                    <svg class="size-12 fill-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>

                    <p class="text-pretty text-lg font-extrabold text-gray-100 uppercase">Profile</p>
                </div>
            </a>
            <div class="bg-violet-500 rounded-md hover:scale-105 transition-transform duration-300 will-change-transform cursor-pointer">
                <div class="flex flex-col py-4 px-2 justify-center items-center gap-2">
                    <svg class="size-12 fill-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>

                    <p class="text-pretty text-lg font-extrabold text-gray-100 uppercase">Address</p>
                </div>
            </div>
        </div>
    </div>
</section>
