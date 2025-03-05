@include('layouts.app')
@extends('admin.layouts.sidebar')

@section('content')

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

<div style="display: flex; position: absolute; left: 80%;">
    <button id="toggleFormBtn" class="btn btn-primary" style="background-color: lightgray; border: 2px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; font-weight: 600; font-family: 'Poppins', sans-serif; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
        <i class="fas fa-plus"></i> 
        Add Category
    </button>
</div>

<div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 10;"></div>
<div id="form" style="display: none; width: 30%; height: 30%; padding: 20px; position: absolute; top: 20%; left: 35%; z-index: 20; background-color: white; display: flex; flex-direction: column; border-radius: 5px; border: 2px solid gray; box-shadow: 5px 5px black; justify-content: center; align-items: center; gap: 30px;">
    <form method="POST" action="{{ route('categories.store') }}" style="display: flex; flex-direction: column; gap: 20px; align-items: center;">
        @csrf
        <div style="align-self: flex-end;">
            <button type="button" id="closebtn" style="color: white; position: absolute; top: 3%; right: 6%; background-color: #f63535; padding: 5px 5px; border-radius: 5px; font-weight: 600; font-size: 12px; border: 1px solid gray; box-shadow: 2px 2px black; transition: transform 0.15s ease-in-out;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                close</button>
        </div>

        <div style="display: flex; align-items: center; gap: 10px;">
            <label for="name" style="font-weight: 600; font-family: 'Poppins', sans-serif; color: #3a3a3a; width: 100px;">Category Name</label>
            <input type="text" name="name" id="name" required style="flex: 1; border-radius: 5px">
        </div>
        <button type="submit" style="font-weight: 600; font-family: 'Poppins', sans-serif; color: white; margin-top: 10%; background-color: #9688d9; border: 1px solid #9688d9; box-shadow: 5px 5px black; padding: 5px 10px; border-radius: 5px; transition: transform 0.15s ease-in-out;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
            Add Category</button>
    </form>
</div>

<div style="margin-top: 5%; height: 600px; border: #e4e4e4ab solid; border-radius: 10px; padding: 0 10px 0 10px; display: flex; flex-direction: column; gap: 20px;">
    <h2 style="margin: 0 0 15px 10px; font-family: 'Poppins', sans sarif; font-weight: 600; font-size: 22px;">Manage Categories</h2>

    <table style="width: 70%; font-family: Arial, sans-serif; font-size: 14px; color: #5a5a5a; align-self: center">
        <thead>
            <tr style="text-align: left;">
                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr style="border-bottom: 2px solid #dee2e6; background-color: white;">
                <td style="padding: 10px; color: #1e1d1d; font-size: 14px; font-family: 'Poppins'; font-weight: bold">{{ $category->name }}</td>
                <td style="padding: 10px; font-weight: bold; color: #000;">
                    <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST" style="position: relative; top: -21%; left: 25%" onsubmit="return confirmDelete()">
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
    {{ $categories->links() }}
</div>
@endsection



<script>
    // JavaScript to hide the form by default and toggle visibility
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('form');
        const toggleButton = document.getElementById('toggleFormBtn');
        const overlay = document.getElementById('overlay');
        const closebtn = document.getElementById('closebtn');

        // Hide the form by default
        overlay.style.display = 'none';
        form.style.display = 'none';

        // Toggle form visibility when the button is clicked
        toggleButton.addEventListener('click', function() {
            if (form.style.display === 'none') {
                form.style.display = 'flex';
                overlay.style.display = 'block';
            } else {
                form.style.display = 'none';
                overlay.style.display = 'none';
            }
        });
        closebtn.addEventListener('click', function() {
            form.style.display = 'none';
            overlay.style.display = 'none';
        });
    });


    function confirmDelete() {
        return confirm('Are you sure you want to delete this category?');
    };


    setTimeout(function() {
        const alert = document.getElementById('alert');
        if (alert){
                alert.style.display = 'none';
            }
        }, 3000); // 3000ms = 3 sec

</script>