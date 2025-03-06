<x-guest-layout>
    <div class="flex flex-col justify-center bg-white dark:bg-gray-800 min-h-64">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 dark:text-gray-300">
                Sign in to your account
            </h2>
            <p class="mt-2 text-sm text-center text-gray-300/75 max-w">
                Or
                <a href="#" class="font-medium text-indigo-500 hover:text-indigo-600">
                    create an account
                </a>
            </p>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="py-8 px-4 bg-white sm:px-10 sm:rounded-lg dark:bg-gray-800">
                <!-- Separator -->
                <div class="relative mb-4">
                    <div class="flex absolute inset-0 items-center">
                        <div class="w-full border-t border-gray-900 dark:border-gray-300"></div>
                    </div>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <x-input-label for="email" :value="__('Email')"
                            class="block text-sm font-medium text-gray-300" />
                        <div class="mt-1">
                            <x-text-input id="email" name="email" type="email" autocomplete="email"
                                :value="old('email')" required
                                class="block relative py-2 px-3 mt-1 w-full placeholder-gray-500 text-gray-900 rounded-md border border-gray-300 appearance-none sm:text-sm dark:text-gray-100 dark:bg-gray-900 dark:border-gray-900 focus:z-10 focus:border-indigo-500 focus:ring-indigo-600 focus:outline-none"
                                placeholder="Enter your email address" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')"
                            class="block text-sm font-medium text-gray-300" />
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="block relative py-2 px-3 mt-1 w-full placeholder-gray-500 text-gray-900 rounded-md border border-gray-900 appearance-none sm:text-sm dark:text-gray-100 dark:bg-gray-900 focus:z-10 focus:border-indigo-500 focus:ring-indigo-600 focus:outline-none"
                                placeholder="Enter your password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="block mt-2">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" name="remember_me" type="checkbox"
                                    class="text-indigo-500 rounded border-gray-300 shadow-sm dark:bg-gray-900 dark:border-gray-900 focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                                <span
                                    class="text-sm text-gray-800 dark:text-gray-400 ms-2">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex justify-end items-center mt-2 text-sm">
                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 focus:outline-none dark:hover:text-gray-300 dark:focus:ring-offset-gray-800"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex relative uppercase tracking-widest justify-center py-2 px-4 w-full text-xs font-semibold text-gray-100 bg-indigo-500 rounded-md border border-transparent focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 focus:outline-none group hover:bg-indigo-600">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>
                <div class="mt-6">

                    <div class="relative">
                        <div class="flex absolute inset-0 items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="flex relative justify-center text-sm">
                            <span class="px-2 text-gray-800 bg-gray-300 rounded-sm">
                                Or continue with
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3 mt-6">
                        <div>
                            <a href="#"
                                class="flex justify-center items-center py-3 px-8 w-full text-sm font-medium text-gray-700 bg-gray-200 rounded-md border border-transparent shadow-sm hover:bg-white focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 focus:outline-none group">
                                <img class="w-5 h-5"
                                    src="https://img.icons8.com/?size=100&id=87277&format=png&color=6366f1"
                                    alt="Login with Facebook">
                            </a>
                        </div>
                        <div>
                            <a href="#"
                                class="flex justify-center items-center py-3 px-8 w-full text-sm font-medium text-gray-700 bg-gray-200 rounded-md border border-transparent shadow-sm hover:bg-white focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 focus:outline-none group">
                                <img class="w-5 h-5"
                                    src="https://img.icons8.com/?size=100&id=A4DsujzAX4rw&format=png&color=6366f1"
                                    alt="Login with X">
                            </a>
                        </div>
                        <div>
                            <a href="#"
                                class="flex justify-center items-center py-3 px-8 w-full text-sm font-medium text-gray-700 bg-gray-200 rounded-md border border-transparent shadow-sm hover:bg-white focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 focus:outline-none group">
                                <img class="w-5 h-5"
                                    src="https://img.icons8.com/?size=100&id=u8a3cm5LAIui&format=png&color=6366f1"
                                    alt="Login with Google">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
