<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<nav x-data="{ open: false }" style="background-color: white; border-bottom: gray solid 0.5px; display: flex; align-items: center; justify-content: space-between; padding: 15px 20px">
    <!-- Logo -->
        @auth
    <div class="shrink-0 flex items-center">
        <a href="{{ route('dashboard') }}">
           <h2 class="flex gap-3" style="font-size: 20px;"><x-application-logo class="block h-9 w-auto fill-current text-gray-800" />MoneyMind</h2> 
        </a>
    </div>

    <div style="margin-left: 200px">
        <input type="text" placeholder="Search..." style="padding: 5px 5px 5px 20px; border: 1px solid #ccc; border-radius: 8px; font-size: 14px;">
    </div>
        <i class="fa-solid fa-bell" style="color: gray; background-color: #e4e4e4ab; padding: 8px 8px; border-radius: 8px; margin-right: -200px"></i>
    <div>

    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
         
        </div>
        @else
        <div class="shrink-0 flex items-center">
           <h2 class="flex gap-3" style="font-size: 20px;"><x-application-logo class="block h-9 w-auto fill-current text-gray-800" />MoneyMind</h2> 
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

    </div>
</nav>
