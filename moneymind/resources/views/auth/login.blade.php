<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="session-status">
            {{ session('status') }}
        </div>
    @endif

    <h2 class="welcome-heading" style="color: white; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1.5rem; margin-bottom: 1.5rem; text-align: center; visibility: hidden;" data-original-text="Welcome Back to MoneyMind">Welcome Back to MoneyMind</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" class="block mb-1 text-white" />
            <x-text-input id="email" class="block mt-1 w-full bg-white/10 border-white/20 text-white" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" class="block mb-1 text-white" />
            <x-text-input id="password" class="block mt-1 w-full bg-white/10 border-white/20 text-white"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-4">
            <button type="submit" class="login-button w-full">
                {{ __('Log in') }}
            </button>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="login-link" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif

            <a class="login-link" href="{{ route('register') }}">
                {{ __('Create account') }}
            </a>
        </div>
    </form>
</x-guest-layout>
