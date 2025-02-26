@include('layouts.app')
@extends('layouts.sidebar')


@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-xl font-bold mb-4">Settings</h2>

    @if(session('success'))
        <div class="p-2 mb-4 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="salary" class="block font-medium">Monthly Salary (MAD)</label>
            <input type="number" name="salary" id="salary" value="{{ old('salary', $user->salary) }}" 
                   class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="credit_day" class="block font-medium">Credit Day (1-31)</label>
            <input type="number" name="credit_day" id="credit_day" value="{{ old('credit_day', $user->credit_day) }}" 
                   class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-gray p-2 rounded">
            Save Settings
        </button>
    </form>
</div>
@endsection
