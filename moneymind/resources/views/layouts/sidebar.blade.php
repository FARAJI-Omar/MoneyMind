<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<div style="display: flex; height: 800px;">
    <!-- Sidebar (20% width) -->
    <div style="width: 15%; color: gray; padding-top: 20px;  border-right: 0.5px gray solid">
        <ul style="list-style: none; padding: 50px 5px; margin: 0;">
            <li style="padding: 20px;">
                <a href="{{ route('dashboard') }}" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fa-solid fa-tachometer-alt" style="margin-right: 10px;"></i> Dashboard
                </a>
            </li>
            <li style="padding: 20px;">
                <a href="#" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fa-solid fa-chart-bar" style="margin-right: 10px;"></i> Statistics
                </a>
            </li>
            <li style="padding: 20px; ">
                <a href="#" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fa-solid fa-wallet" style="margin-right: 10px;"></i> Expenses
                </a>
            </li>
            <li style="padding: 20px; ">
                <a href="{{ route('settings')}}" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fa-solid fa-gears" style="margin-right: 10px;"></i> Settigns
                </a>
            </li>
            <li style="padding: 20px; ">
                <a href="#" style="text-decoration: none; display: flex; align-items: center;">
                    <i class="fa-solid fa-user" style="margin-right: 10px;"></i> Profile
                </a>
            </li>
            <li style="padding: 20px; margin-top: 40px">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: gray; display: flex; align-items: center; cursor: pointer;">
                        <i class="fa-solid fa-sign-out-alt" style="margin-right: 10px;"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content (80% width) -->
    <div style="width: 80%; padding: 20px;">
        @yield('content')
    </div>
</div>
</body>
</html>
