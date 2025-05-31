<x-guest-layout>
    <!-- Session Status -->
    <x-admin.auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email or Nickname -->
        <div>
            <x-admin.input-label for="login" :value="__('Email or Nickname')" />
            <x-admin.text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus />
            <x-admin.input-error :messages="$errors->get('login')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-admin.input-label for="password" :value="__('Password')" />
            <x-admin.text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" />
            <x-admin.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Login and Forgot Password -->
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-admin.primary-button class="ms-3">
                {{ __('Log in') }}
            </x-admin.primary-button>
        </div>

        <!-- Social Login -->
        <div class="flex items-center justify-center mt-4 gap-4">
            <x-admin.primary-button>
                <a href="{{ url('/auth/google') }}" class="btn btn-google w-full h-full block text-center">Google</a>
            </x-admin.primary-button>

            <x-admin.primary-button>
                <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook w-full h-full block text-center">Facebook</a>
            </x-admin.primary-button>
        </div>

        <!-- Register Link -->
        <div class="flex justify-center mt-6">
            <span class="text-sm text-gray-600 dark:text-gray-400">
                {{ __("Don't have an account?") }}
            </span>
            <a href="{{ route('register') }}" class="ml-2 underline text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                {{ __('Register here') }}
            </a>
        </div>
    </form>
</x-guest-layout>
