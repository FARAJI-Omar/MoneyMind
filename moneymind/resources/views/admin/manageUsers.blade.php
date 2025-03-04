@include('layouts.app')
@extends('admin.layouts.sidebar')

@section('content')

@if(session('success'))
<div style="width: 400px; height: 50px; background-color: white; color: green; border: green 2px solid; border-radius: 5px; display: flex;">
    <div style="background-color: green; width: 20%; display: flex; justify-content: center; align-items: center"><i class="fa-solid fa-circle-check" style="color: white; font-weight: bold; font-size: 30px"></i></div>
    <div>
        {{ session('success') }}
    </div>
</div>
@endif

<div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 10;"></div>
<div style="margin-top: 5%; height: 600px; border: #e4e4e4ab solid; border-radius: 10px; padding: 0 10px 0 10px; display: flex; flex-direction: column; gap: 20px;">
    <h2 style="margin: 0 0 15px 10px; font-family: 'Poppins', sans sarif; font-weight: 600; font-size: 22px;">Manage Users</h2>

    <table style="width: 90%; font-family: Arial, sans-serif; font-size: 14px; color: #5a5a5a; align-self: center">
        <thead>
            <tr style="text-align: left;">
                <th style="padding: 10px;">User</th>
                <th style="padding: 10px;">Last Active</th>
                <th style="padding: 10px;">Status</th>
                <th style="padding: 10px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr style="border-bottom: 2px solid #dee2e6; background-color: white;">
                <td style="padding: 10px; color: #1e1d1d; font-size: 14px; font-family: 'Poppins'; font-weight: bold">{{ $user->name }}</td>
                <td style="padding: 10px; color: #1e1d1d; font-size: 13px; font-family: 'Poppins'">{{ \Carbon\Carbon::parse($user->last_login_at)->format('H:i  d-m-Y') }}</td>
                <td style="padding: 10px; color: #1e1d1d; font-size: 13px; font-family: 'Poppins'">
                    <p style="width: 37%; background-color: lightgray; padding: 3px 7px; border-radius: 7px">{{ $user->status }} </p>
                </td>
                <td style="padding: 10px; font-weight: bold; color: #000;">
                    <form action="{{ route('admin.destroyUser', ['id' => $user->id]) }}" method="POST" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: red; color: white; font-size: 16px; border: 1px solid red; box-shadow: 2px 2px black; border-radius: 5px; padding: 2px 7px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<!-- Pagination Links -->
<div style="margin-top: 20px;">
    {{ $users->links() }}
</div>

@endsection

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this user?');
    }

</script>
