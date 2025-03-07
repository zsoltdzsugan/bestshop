<div class="bg-gray-900">
    <header class="pl-1 max-w-7xl mx-auto">
      <div class="mx-auto flex h-10 max-w-screen-xl items-center gap-8">
        <button
          class="block bg-blue-500/75 p-2.5 text-gray-900 transition hover:text-gray-600/75"
        >
          <span class="sr-only">Toggle menu</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="size-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>

        <div class="flex flex-1 items-center justify-end md:justify-between">
          <nav aria-label="Global" class="hidden md:block">
            <ul class="flex items-center gap-6 text-sm">
              <li>
                <x-nav-link class="text-gray-500 transition hover:text-gray-500/75" href="#"> About </x-nav-link>
              </li>

              <li>
                <x-nav-link class="text-gray-500 transition hover:text-gray-500/75" href="#"> Careers </x-nav-link>
              </li>

              <li>
                <x-nav-link class="text-gray-500 transition hover:text-gray-500/75" href="#"> History </x-nav-link>
              </li>

              <li>
                <x-nav-link class="text-gray-500 transition hover:text-gray-500/75" href="#"> Services </x-nav-link>
              </li>

              <li>
                <x-nav-link class="text-gray-500 transition hover:text-gray-500/75" href="#"> Projects </x-nav-link>
              </li>

              <li>
                <x-nav-link class="text-gray-500 transition hover:text-gray-500/75" href="#"> Blog </x-nav-link>
              </li>
            </ul>
          </nav>

          <div class="flex items-center gap-4">
            <div class="sm:flex sm:gap-4">
              <x-nav-link :href="route('login')">
                Login
              </x-nav-link>

              <x-nav-link :href="route('register')">
                Register
              </x-nav-link>
            </div>

            <button
              class="block rounded-sm bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-600/75 md:hidden"
            >
              <span class="sr-only">Toggle menu</span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </header>
</div>
