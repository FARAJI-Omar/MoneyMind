@include('layouts.app')
@extends('admin.layouts.sidebar')

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Custom Scripts -->
<script src="{{ asset('js/admin-particles.js') }}"></script>
<script src="{{ asset('js/admin-charts.js') }}"></script>

<!-- Pass stats data to JavaScript -->
<script>
    window.adminStats = @json($stats ?? []);
</script>

@section('content')
    <div style="height: auto; margin: 0 0 40px 0; display: flex; flex-direction: column; gap: 30px; position: relative;">
        <!-- Welcome Section with Animation -->
        <div style="position: relative; background: linear-gradient(135deg, #180e5b 0%, #1a237e 100%); border-radius: 15px; padding: 25px; overflow: hidden; margin-bottom: 10px;">
            <canvas id="admin-particles-canvas" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;"></canvas>
            <div style="position: relative; z-index: 1;">
                <h2 style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 24px; color: white; margin-bottom: 10px;">Welcome to Admin Dashboard</h2>
                <p style="font-family: 'Poppins', sans-serif; color: rgba(255,255,255,0.8); font-size: 16px;">Monitor your platform's performance and user statistics</p>
            </div>
        </div>

        <!-- Stats Cards Row -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
            <!-- Total Users Card -->
            <div style="background: white; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 25px; transition: all 0.3s ease; position: relative; overflow: hidden;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.05)'">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                    <div>
                        <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 18px; color: #333; margin-bottom: 5px;">Total Users</h3>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 13px; color: #888;">Overall registered users</p>
                    </div>
                    <div style="background: rgba(24, 14, 91, 0.1); width: 50px; height: 50px; border-radius: 12px; display: flex; justify-content: center; align-items: center;">
                        <i class="fa-solid fa-users" style="font-size: 20px; color: #180e5b;"></i>
                    </div>
                </div>
                <h2 style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 32px; color: #180e5b; margin-bottom: 10px;">{{ $stats['totalUsers'] }}</h2>
                <div style="display: flex; align-items: center;">
                    <span style="background: rgba(0, 187, 240, 0.1); color: #00bbf0; padding: 4px 8px; border-radius: 20px; font-size: 12px; font-weight: 600; margin-right: 8px;">+{{ $stats['currentMonthNewUsers'] }}</span>
                    <span style="font-size: 13px; color: #888;">this month</span>
                </div>
            </div>

            <!-- Active Users Card -->
            <div style="background: white; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 25px; transition: all 0.3s ease; position: relative; overflow: hidden;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.05)'">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                    <div>
                        <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 18px; color: #333; margin-bottom: 5px;">Active Users</h3>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 13px; color: #888;">Currently active accounts</p>
                    </div>
                    <div style="background: rgba(29, 189, 29, 0.1); width: 50px; height: 50px; border-radius: 12px; display: flex; justify-content: center; align-items: center;">
                        <i class="fa-solid fa-person-arrow-up-from-line" style="font-size: 20px; color: #1dbd1d;"></i>
                    </div>
                </div>
                <h2 style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 32px; color: #1dbd1d; margin-bottom: 10px;">{{ $stats['activeUsers'] }}</h2>
                <div style="display: flex; align-items: center;">
                    <span style="background: rgba(29, 189, 29, 0.1); color: #1dbd1d; padding: 4px 8px; border-radius: 20px; font-size: 12px; font-weight: 600; margin-right: 8px;">{{ $stats['totalUsers'] > 0 ? round(($stats['activeUsers'] / $stats['totalUsers']) * 100, 1) : 0 }}%</span>
                    <span style="font-size: 13px; color: #888;">of total users</span>
                </div>
            </div>

            <!-- Inactive Users Card -->
            <div style="background: white; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 25px; transition: all 0.3s ease; position: relative; overflow: hidden;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.05)'">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                    <div>
                        <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 18px; color: #333; margin-bottom: 5px;">Inactive Users</h3>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 13px; color: #888;">Dormant accounts</p>
                    </div>
                    <div style="background: rgba(255, 82, 82, 0.1); width: 50px; height: 50px; border-radius: 12px; display: flex; justify-content: center; align-items: center;">
                        <i class="fa-solid fa-person-arrow-down-to-line" style="font-size: 20px; color: #ff5252;"></i>
                    </div>
                </div>
                <h2 style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 32px; color: #ff5252; margin-bottom: 10px;">{{ $stats['inactiveUsers'] }}</h2>
                <div style="display: flex; align-items: center;">
                    <span style="background: rgba(255, 82, 82, 0.1); color: #ff5252; padding: 4px 8px; border-radius: 20px; font-size: 12px; font-weight: 600; margin-right: 8px;">{{ $stats['totalUsers'] > 0 ? round(($stats['inactiveUsers'] / $stats['totalUsers']) * 100, 1) : 0 }}%</span>
                    <span style="font-size: 13px; color: #888;">of total users</span>
                </div>
            </div>

            <!-- Average Income Card -->
            <div style="background: white; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 25px; transition: all 0.3s ease; position: relative; overflow: hidden;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.05)'">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                    <div>
                        <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 18px; color: #333; margin-bottom: 5px;">Average Income</h3>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 13px; color: #888;">User reported salaries</p>
                    </div>
                    <div style="background: rgba(0, 187, 240, 0.1); width: 50px; height: 50px; border-radius: 12px; display: flex; justify-content: center; align-items: center;">
                        <i class="fa-solid fa-money-bill-wave" style="font-size: 20px; color: #00bbf0;"></i>
                    </div>
                </div>
                <h2 style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 32px; color: #00bbf0; margin-bottom: 10px;">{{ number_format($stats['averageSalary'], 0, '.', ',') }} <span style="font-size: 16px; font-weight: 500;">dh</span></h2>
                <div style="display: flex; align-items: center;">
                    <span style="background: rgba(0, 187, 240, 0.1); color: #00bbf0; padding: 4px 8px; border-radius: 20px; font-size: 12px; font-weight: 600; margin-right: 8px;">Avg</span>
                    <span style="font-size: 13px; color: #888;">user salary</span>
                </div>
            </div>
        </div>

        <!-- Activity Overview Section -->
        <div style="background: white; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 25px; margin-top: 10px;">
            <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 20px; color: #333; margin-bottom: 20px;">Platform Activity Overview</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                <!-- New Registrations Chart -->
                <div style="background: #f8f9fa; border-radius: 12px; padding: 20px; height: 250px;">
                    <h4 style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 16px; color: #555; margin-bottom: 15px;">New Registrations</h4>
                    <div style="height: 200px;">
                        <canvas id="newRegistrationsChart"></canvas>
                    </div>
                </div>

                <!-- Category Distribution -->
                <div style="background: #f8f9fa; border-radius: 12px; padding: 20px; height: 250px;">
                    <h4 style="font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 16px; color: #555; margin-bottom: 15px;">Category Distribution</h4>
                    <div style="height: 200px; display: flex; align-items: center; justify-content: center;">
                        <canvas id="categoryDistributionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
