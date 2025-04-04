@include('layouts.app')
@extends('admin.layouts.sidebar')

@section('content')

@if(session('success'))
<div id="alert" style="width: 400px; position: fixed; top: 20px; right: 20px; z-index: 1000; background-color: white; color: #10b981; border-left: 4px solid #10b981; border-radius: 4px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); display: flex; font-family: 'Poppins'; font-weight: 500; overflow: hidden; animation: slideIn 0.5s ease-out;">
    <div style="background-color: #10b981; width: 15%; display: flex; justify-content: center; align-items: center; padding: 14px 0;">
        <i class="fa-solid fa-circle-check" style="color: white; font-size: 20px"></i>
    </div>
    <div style="align-self: center; padding: 14px; font-size: 14px; flex-grow: 1;">
        {{ session('success') }}
    </div>
    <button onclick="document.getElementById('alert').style.display='none'" style="background: transparent; border: none; color: #9ca3af; padding: 0 14px; cursor: pointer; align-self: center;">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif

<div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 10;"></div>
<div style="margin-top: 2%; height: auto; min-height: 600px; border: none; border-radius: 15px; padding: 25px; display: flex; flex-direction: column; gap: 20px; background-color: white; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
        <h2 style="margin: 0; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 24px; color: #1e1d1d;">Manage Users</h2>
        <div style="display: flex; gap: 15px; align-items: center;">
            <select id="statusFilter" onchange="filterByStatus()" style="padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 14px; outline: none;">
                <option value="all" {{ !isset($statusFilter) ? 'selected' : '' }}>All Status</option>
                <option value="active" {{ isset($statusFilter) && strtolower($statusFilter) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ isset($statusFilter) && strtolower($statusFilter) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>

    <div style="width: 100%; overflow-x: auto; border-radius: 8px;">
        <table style="width: 100%; font-family: 'Poppins', sans-serif; font-size: 14px; color: #5a5a5a; border-collapse: separate; border-spacing: 0; border-radius: 8px; overflow: hidden;">
            <thead>
                <tr style="text-align: left; background-color: #f9fafb;">
                    <th style="padding: 15px 20px; color: #374151; font-weight: 600; border-bottom: 1px solid #e5e7eb;">User</th>
                    <th style="padding: 15px 20px; color: #374151; font-weight: 600; border-bottom: 1px solid #e5e7eb;">Last Active</th>
                    <th style="padding: 15px 20px; color: #374151; font-weight: 600; border-bottom: 1px solid #e5e7eb;">Status</th>
                    <th style="padding: 15px 20px; color: #374151; font-weight: 600; border-bottom: 1px solid #e5e7eb;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="user-row" data-status="{{ strtolower($user->status) }}" style="border-bottom: 1px solid #e5e7eb; background-color: white; transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='white'">
                    <!-- Debug info -->
                    <!-- Status: {{ $user->status }} -->
                    <!-- Lowercase: {{ strtolower($user->status) }} -->
                    <td style="padding: 15px 20px; color: #1e1d1d; font-size: 14px; font-weight: 500;">{{ $user->name }}</td>
                    <td style="padding: 15px 20px; color: #6b7280; font-size: 13px;">
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <i class="fa-regular fa-clock" style="color: #9ca3af;"></i>
                            {{ \Carbon\Carbon::parse($user->last_login_at)->format('H:i, d M Y') }}
                        </div>
                    </td>
                    <td style="padding: 15px 20px; font-size: 13px;">
                        <span class="status-indicator" style="display: inline-block; padding: 4px 12px; border-radius: 9999px; font-weight: 500; font-size: 12px;
                            @if(strtolower($user->status) == 'active')
                                background-color: rgba(16, 185, 129, 0.1); color: #10b981;
                            @else
                                background-color: rgba(239, 68, 68, 0.1); color: #ef4444;
                            @endif
                        ">
                            @if(strtolower($user->status) == 'active')
                                <i class="fa-solid fa-circle" style="font-size: 8px; margin-right: 5px;"></i>
                            @else
                                <i class="fa-solid fa-circle" style="font-size: 8px; margin-right: 5px;"></i>
                            @endif
                            {{ $user->status }}
                        </span>
                    </td>
                    <td style="padding: 15px 20px;">
                        <form action="{{ route('admin.destroyUser', ['id' => $user->id]) }}" method="POST" onsubmit="return confirmDelete()" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: rgba(239, 68, 68, 0.1); color: #ef4444; border: none; border-radius: 8px; width: 32px; height: 32px; display: flex; justify-content: center; align-items: center; cursor: pointer; transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='rgba(239, 68, 68, 0.2)'" onmouseout="this.style.backgroundColor='rgba(239, 68, 68, 0.1)'">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<!-- Pagination Links -->
<div id="pagination-container" style="margin-top: 20px; display: flex; justify-content: center;">
    <div style="display: inline-block; background-color: white; padding: 8px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        {{ $users->links() }}
    </div>
</div>

@endsection

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this user?');
    };

    // Log all user statuses when page loads and initialize filter
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.getElementsByClassName('user-row');
        console.log('Total rows:', rows.length);

        for (let i = 0; i < rows.length; i++) {
            const status = rows[i].getAttribute('data-status');
            const userName = rows[i].getElementsByTagName('td')[0].textContent.trim();
            console.log(`User: ${userName}, Status: ${status}`);

            // Also check status from the indicator
            const statusIndicator = rows[i].querySelector('.status-indicator');
            if (statusIndicator) {
                console.log(`Status text: ${statusIndicator.textContent.trim()}`);
            }
        }

        // Reset filter to 'all' on page load
        const statusFilter = document.getElementById('statusFilter');
        if (statusFilter) {
            statusFilter.value = 'all';
        }
    });

    // Auto-hide alert after 3 seconds
    setTimeout(function() {
        const alert = document.getElementById('alert');
        if (alert) {
            alert.style.animation = 'slideOut 0.5s ease-in forwards';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 500);
        }
    }, 3000);

    // Filter by status - simpler approach with page redirection
    function filterByStatus() {
        const select = document.getElementById('statusFilter');
        const filter = select.value.toLowerCase();

        console.log('Filter selected:', filter); // Debug log

        // Instead of trying to manipulate the DOM, let's just redirect to the appropriate URL
        if (filter === 'all') {
            // Redirect to the base URL without any filter
            window.location.href = window.location.pathname;
        } else {
            // Redirect to the URL with the status filter
            window.location.href = window.location.pathname + '?status=' + filter;
        }
    }
</script>

<style>
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
</style>
