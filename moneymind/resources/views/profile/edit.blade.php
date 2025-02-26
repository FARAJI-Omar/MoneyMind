@extends('layouts.navigation')

@section('title', 'Edit Profile')

@section('content')
<h1>Edit Profile</h1>
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')
    <!-- Form fields for editing profile -->
    <button type="submit">Save Changes</button>
</form>
@endsection
