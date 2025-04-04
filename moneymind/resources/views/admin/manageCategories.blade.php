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

<div style="margin-top: 2%; height: auto; min-height: 600px; border: none; border-radius: 15px; padding: 25px; display: flex; flex-direction: column; gap: 20px; background-color: white; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
        <h2 style="margin: 0; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 24px; color: #1e1d1d;">Manage Categories</h2>
        <div style="display: flex; position: absolute; left: 80%;">
            <button id="toggleFormBtn" class="btn btn-primary" style="background-color: lightgray; border: 2px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; font-weight: 600; font-family: 'Poppins', sans-serif; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
                <i class="fas fa-plus"></i>
                Add Category
            </button>
        </div>
    </div>

    <div style="width: 100%; overflow-x: auto; border-radius: 8px;">
        <table style="width: 100%; font-family: 'Poppins', sans-serif; font-size: 14px; color: #5a5a5a; border-collapse: separate; border-spacing: 0; border-radius: 8px; overflow: hidden;">
            <thead>
                <tr style="text-align: left; background-color: #f9fafb;">
                    <th style="padding: 15px 20px; color: #374151; font-weight: 600; border-bottom: 1px solid #e5e7eb;">Category Name</th>
                    <th style="padding: 15px 20px; color: #374151; font-weight: 600; border-bottom: 1px solid #e5e7eb; width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr style="border-bottom: 1px solid #e5e7eb; background-color: white; transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='white'">
                    <td style="padding: 15px 20px; color: #1e1d1d; font-size: 14px; font-weight: 500;">{{ $category->name }}</td>
                    <td style="padding: 15px 20px;">
                        <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST" onsubmit="return confirmDelete()" style="margin: 0;">
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
<div style="margin-top: 20px; display: flex; justify-content: center;">
    <div style="display: inline-block; background-color: white; padding: 8px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        {{ $categories->links() }}
    </div>
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
            form.style.display = 'flex';
            overlay.style.display = 'block';
            // Add animation class
            form.classList.add('fade-in');
        });

        // Close form when close button is clicked
        closebtn.addEventListener('click', function() {
            closeForm();
        });

        // Close form when overlay is clicked
        overlay.addEventListener('click', function() {
            closeForm();
        });

        // Function to close the form
        function closeForm() {
            form.style.display = 'none';
            overlay.style.display = 'none';
        }
    });

    // Confirm delete
    function confirmDelete() {
        return confirm('Are you sure you want to delete this category?');
    };

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

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
        animation: fadeIn 0.3s ease-out;
    }
</style>