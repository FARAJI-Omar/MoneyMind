@include('layouts.app')
@extends('layouts.sidebar')

@section('content')


<div>
@if(session('success'))
<div id="alert" style="width: 400px; height: 45px; background-color: white; color: green; border: green 2px solid; border-radius: 5px; display: flex; font-family: 'Poppins'; font-weight: bold;">
    <div style="background-color: green; width: 15%; display: flex; justify-content: center; align-items: center">
        <i class="fa-solid fa-circle-check" style="color: white; font-weight: bold; font-size: 30px"></i>
    </div>
    <div style="align-self: center; padding-left: 10px; font-size: 14px">
        {{ session('success') }}
    </div>
</div>
@endif
    <div>
        <button id="toggleFormBtn" class="btn btn-primary" style="background-color: lightgray; border: 2px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; font-weight: 600; font-family: 'Poppins', sans-serif; width: 100%; height: 50px; margin-bottom: 30px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
            <i class="fa-solid fa-pen-to-square"></i> Add new item to wish list</button>
    </div>

    {{-- form --}}
    <div id="form" style="display: none; flex-direction: column; gap: 20px; align-items: center; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 5px 5px gray; width: 60%; margin: 0 auto 40px auto">
        <form action="{{ route('wishlist.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-medium">Item's Name</label>
                <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="target_amount" class="block font-medium">Target Amount (dh)</label>
                <input type="number" name="target_amount" id="target_amount" class="w-full p-2 border rounded" required>
            </div>

            <div style="display: flex; font-weight: 600; font-family: 'Poppins', sans-serif; color: white; margin-top: 20%; gap:20px">
                <button type="button" id="cancel" Style="background-color: gray; border: 1px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">Cancel</button>
                <button type="submit" Style="background-color: #9688d9; border: 1px solid #9688d9; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    Save
                </button>
            </div>
        </form>
    </div>
    <div style="margin-top: 2%; height: 50%; border: #e4e4e4ab solid; border-radius: 10px; padding: 0 10px 0 10px">
    <h2 style="margin: 0 0 15px 10px; font-family: 'Poppins', sans sarif; font-weight: 600; font-size: 22px">Wish List</h2>

    <table style="width: 100%; font-family: Arial, sans-serif; font-size: 14px; color: #5a5a5a">
        <thead>
            <tr style="text-align: left;">
                <th style="padding: 10px;">Item</th>
                <th style="padding: 10px;">target Amount</th>
                <th style="padding: 10px;">Added on</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wishListItems as $wishListItem)
            <tr style="border-bottom: 1px solid #dee2e6; background-color: white;">
                <td style="padding: 10px; font-weight: bold; color: #000;">{{ $wishListItem->name }}</td>
                <td style="padding: 10px; font-weight: bold; color: #000;">{{ $wishListItem->target_amount }} dh</td>
                <td style="padding: 10px; color: #8a8d91;">{{ $wishListItem->created_at->format('d M Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<!-- Pagination Links -->
<div style="margin-top: 20px;">
    {{ $wishListItems->links() }}
</div>
@endsection



<script>
    // JavaScript to hide the form by default and toggle visibility
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('form');
        const toggleButton = document.getElementById('toggleFormBtn');
        const closebtn = document.getElementById('cancel');

        // Hide the form by default
        form.style.display = 'none';

        // Toggle form visibility when the button is clicked
        toggleButton.addEventListener('click', function() {
            if (form.style.display === 'none') {
                form.style.display = 'flex';
            } else {
                form.style.display = 'none';
            }
        });
        closebtn.addEventListener('click', function() {
            form.style.display = 'none';
        });

    });


     setTimeout(function() {
        const alert = document.getElementById('alert');
        if (alert){
                alert.style.display = 'none';
            }
        }, 3000); // 3000ms = 3 sec

</script>