<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<div style="display: flex; height: auto;">
    <!-- Sidebar (20% width) -->
    <div style="width: 15%; color: #4e4e4e; padding-top: 20px;  border-right: 0.5px gray solid">
        <ul style="list-style: none; padding: 50px 5px; margin: 0;">
            <li id="dashboard" style="padding: 20px; {{ request()->routeIs('admin.dashboard') ? 'background-color: black; color: white; border-radius: 0 10px 10px 0' : '' }}">
                <a href="{{ route('admin.dashboard') }}" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fa-solid fa-tachometer-alt" style="margin-right: 10px; color: #2c2b2b"></i> Dashboard
                </a>
            </li>
            <li style="padding: 20px; {{ request()->routeIs('admin.statistics') ? 'background-color: black; color: white; border-radius: 0 10px 10px 0' : '' }}">
                <a href="#" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fa-solid fa-chart-bar" style="margin-right: 10px; color: #2c2b2b"></i> Statistics
                </a>
            </li>
            {{-- <li style="padding: 20px; {{ request()->routeIs('admin.manageUsers') ? 'background-color: black; color: white; border-radius: 0 10px 10px 0' : '' }}">
                <a href="{{ route('admin.manageUsers')}}" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fa-solid fa-wallet" style="margin-right: 10px; color: #2c2b2b"></i> Manage Users
                </a>
            </li> --}}
            <li style="padding: 20px; {{ request()->routeIs('admin.manageCategories') ? 'background-color: black; color: white; border-radius: 0 10px 10px 0' : '' }}">
                <a href="{{ route('admin.manageCategories')}}" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fa-solid fa-clipboard-list" style="margin-right: 10px; color: #2c2b2b"></i> Manage Categories
                </a>
            </li>
            {{-- <li style="padding: 20px; {{ request()->routeIs('admin.profile.edit') ? 'background-color: black; color: white; border-radius: 0 10px 10px 0' : '' }}">
                <a href="{{ route('admin.profile.edit')}}" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fa-solid fa-user" style="margin-right: 10px; color: #2c2b2b"></i> Profile
                </a>
            </li> --}}
            <li style="padding: 20px; margin-top: 40px">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: gray; display: flex; align-items: center; cursor: pointer; color: black">
                        <i class="fa-solid fa-sign-out-alt" style="margin-right: 10px; color: #2c2b2b"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content (80% width) -->
    <div style="width: 80%; padding: 20px 20px 70px;">
        @yield('content')
    </div>
</div>
@include('layouts.footer')
