<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<nav x-data="{ open: false }" style="background-color: white; border-bottom: gray solid 0.5px; display: flex; align-items: center; justify-content: space-between; padding: 5px 20px 15px">
    @auth
    <div class="shrink-0 flex items-center">
        <a href="{{ auth()->check() 
            ? (auth()->user()->role === 'admin' 
                ? route('admin.dashboard') 
                : (auth()->user()->role === 'user' 
                    ? route('dashboard') 
                    : route('homepage')))
            : route('homepage') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>
    </div>

   

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
    </div>
    @else
    <div class="shrink-0 flex items-center">
        <a href="{{ route('homepage') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>
    </div>
    <div style="display: flex; gap: 20px">
        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
            {{ __('Log In') }}
        </x-nav-link>
        <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
            {{ __('Register') }}
        </x-nav-link>
    </div>
    @endauth
</nav>


