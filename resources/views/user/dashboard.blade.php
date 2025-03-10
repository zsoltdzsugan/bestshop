<x-public-layout>
    <div class="flex flex-col space-y-12">
        @include('user.layouts.navigation')

        <section id="messages">
            <div class="w-full border rounded-md shadow-md bg-white">
                <h3 class="text-lg text-pretty font-bold uppercase px-6 py-4">Messages</h3>

                <div class="w-full flex gap-6 hover:bg-gray-100">
                    <div class="flex justify-center items-center p-6 w-[17%]">
                        <img class="size-16 rounded-full object-cover" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="Rounded avatar">
                    </div>
                    <div class="flex flex-col p-6 w-auto gap-2">
                        <h4 class="text-lg font-bold">Sender</h4>
                        <span class="text-sm italic">22 minutes ago</span>
                        <p class="text-md text-pretty">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam quae natus sapiente est ex quaerat, cupiditate consectetur explicabo, libero, ipsa ab odit placeat quam ut voluptatem aliquid voluptatibus voluptates cumque. In vel veritatis veniam et nemo iusto ad ipsum adipisci cupiditate nesciunt impedit, corrupti illum.
                        </p>

                    </div>
                    <div class="flex justify-center items-center p-6 w-[10%]">
                        <svg class="size-6 fill-slate-900 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </div>
                </div>
                <div class="w-full flex gap-6 hover:bg-gray-100">
                    <div class="flex justify-center items-center p-6 w-[17%]">
                        <img class="size-16 rounded-full object-cover" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="Rounded avatar">
                    </div>
                    <div class="flex flex-col p-6 w-auto gap-2">
                        <h4 class="text-lg font-bold">Sender</h4>
                        <span class="text-sm italic">22 minutes ago</span>
                        <p class="text-md text-pretty">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam quae natus sapiente est ex quaerat, cupiditate consectetur explicabo, libero, ipsa ab odit placeat quam ut voluptatem aliquid voluptatibus voluptates cumque. In vel veritatis veniam et nemo iusto ad ipsum adipisci cupiditate nesciunt impedit, corrupti illum.
                        </p>

                    </div>
                    <div class="flex justify-center items-center p-6 w-[10%]">
                        <svg class="size-6 fill-slate-900 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </div>
                </div>
                <div class="w-full flex gap-6 hover:bg-gray-100">
                    <div class="flex justify-center items-center p-6 w-[17%]">
                        <img class="size-16 rounded-full object-cover" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="Rounded avatar">
                    </div>
                    <div class="flex flex-col p-6 w-auto gap-2">
                        <h4 class="text-lg font-bold">Sender</h4>
                        <span class="text-sm italic">22 minutes ago</span>
                        <p class="text-md text-pretty">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam quae natus sapiente est ex quaerat, cupiditate consectetur explicabo, libero, ipsa ab odit placeat quam ut voluptatem aliquid voluptatibus voluptates cumque. In vel veritatis veniam et nemo iusto ad ipsum adipisci cupiditate nesciunt impedit, corrupti illum.
                        </p>

                    </div>
                    <div class="flex justify-center items-center p-6 w-[10%]">
                        <svg class="size-6 fill-slate-900 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </div>
                </div>
                <div class="w-full flex gap-6 hover:bg-gray-100">
                    <div class="flex justify-center items-center p-6 w-[17%]">
                        <img class="size-16 rounded-full object-cover" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="Rounded avatar">
                    </div>
                    <div class="flex flex-col p-6 w-auto gap-2">
                        <h4 class="text-lg font-bold">Sender</h4>
                        <span class="text-sm italic">22 minutes ago</span>
                        <p class="text-md text-pretty">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam quae natus sapiente est ex quaerat, cupiditate consectetur explicabo, libero, ipsa ab odit placeat quam ut voluptatem aliquid voluptatibus voluptates cumque. In vel veritatis veniam et nemo iusto ad ipsum adipisci cupiditate nesciunt impedit, corrupti illum.
                        </p>

                    </div>
                    <div class="flex justify-center items-center p-6 w-[10%]">
                        <svg class="size-6 fill-slate-900 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-public-layout>
