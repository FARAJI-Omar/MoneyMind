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
            <i class="fa-solid fa-pen-to-square"></i> Edit Salary</button>
    </div>

    {{-- form1 --}}
    <div id="form1" style="display: none; flex-direction: column; gap: 20px; align-items: center; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 5px 5px gray; width: 60%; margin: 0 auto 40px auto">
        <form action="{{ route('settings.update') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="salary" class="block font-medium">Monthly Salary (MAD)</label>
                <input type="number" name="salary" id="salary" value="{{ old('salary', $user->salary) }}" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="credit_day" class="block font-medium">Credit Day (1-31)</label>
                <input type="number" name="credit_day" id="credit_day" value="{{ old('credit_day', $user->credit_day) }}" class="w-full p-2 border rounded" required>
            </div>

            <div style="display: flex; font-weight: 600; font-family: 'Poppins', sans-serif; color: white; margin-top: 20%; gap:20px">
                <button type="button" id="cancel" Style="background-color: gray; border: 1px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">Cancel</button>
                <button type="submit" Style="background-color: #9688d9; border: 1px solid #9688d9; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    Save Changes
                </button>
            </div>
        </form>
    </div>

    <div>
        <button id="toggleFormBtn2" class="btn btn-primary" style="background-color: lightgray; border: 2px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; font-weight: 600; font-family: 'Poppins', sans-serif; width: 100%; height: 50px; margin-bottom: 30px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'"">
            <i class="fa-solid fa-pen-to-square"></i> Edit Reccuring Expenses</button>
    </div>

    {{-- form2 --}}
    <div id="form2" style="display: flex; flex-direction: column; gap: 20px; align-items: center; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 5px 5px gray; width: 100%; height: 500px; margin: 0 auto 40px auto; overflow-x: hidden ;overflow-y: scroll;">
        @foreach($recurringExpenses as $recurringExpense)
        <div>
        <h2 style="width: 100%; font-weight: bold; font-size: 20px;">{{ $recurringExpense->name }}</h2>
        <form action="{{ route('settings.updatee', ['id' => $recurringExpense->id]) }}" method="POST">
            @csrf

            <table class="w-full border-collapse border border-gray-300 mb-4">
                <tr>
                    <td class="p-2 font-medium">Amount (MAD)</td>
                    <td class="p-2">
                        <input type="number" name="amount" id="amount" value="{{ old('amount', $recurringExpense->price) }}" class="w-full p-2 border rounded" required>
                    </td>

                    <td class="p-2 font-medium">Category</td>
                    <td class="p-2">
                        <select name="category_id" id="category" required style="flex: 1; width: 200px; border-radius: 5px">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $recurringExpense->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </td>

                    <td class="p-2 font-medium">Due Date</td>
                    <td class="p-2">
                        <input type="number" name="due_date" id="due_date" value="{{ old('due_date', $recurringExpense->due_date)}}" class="w-full p-2 border rounded" required min="1" max="31">
                    </td>
                </tr>
            </table>

            <div style="display: flex; font-weight: 600; font-family: 'Poppins', sans-serif; color: white; margin-top: 20px; gap: 20px; margin-bottom: 0px">
                <button type="button" id="cancel2" Style="background-color: gray; border: 1px solid gray; box-shadow: 2px 2px black; border-radius: 5px; padding: 2px 7px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">Cancel</button>
                <button type="submit" style="background-color: #9688d9; border: 1px solid #9688d9; box-shadow: 2px 2px black; border-radius: 5px; padding: 2px 7px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'; this.setAttribute('title', 'save')" onmouseout="this.style.transform='scale(1)'; this.removeAttribute('title')">
                    <i class="fa-solid fa-floppy-disk" style="color: #ffffff;"></i>
                </button>
            </div>
        </form>
        {{-- Delete form --}}
        <form action="{{ route('settings.destroy', ['id' => $recurringExpense->id]) }}" method="POST" style="position: relative; top: -17%; left: 18%">
            @csrf
            @method('DELETE')
            <button type="submit" style="background-color: red; color: white; font-size: 16px; border: 1px solid red; box-shadow: 2px 2px black; border-radius: 5px; padding: 2px 7px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'; this.setAttribute('title', 'delete')" onmouseout="this.style.transform='scale(1)'; this.removeAttribute('title')">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
        </div>
        @endforeach
    </div>

     <div>
        <button id="toggleFormBtn3" class="btn btn-primary" style="background-color: lightgray; border: 2px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; font-weight: 600; font-family: 'Poppins', sans-serif; width: 100%; height: 50px; margin-bottom: 30px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
            <i class="fa-solid fa-pen-to-square"></i> Edit wishlist</button>
    </div>

     {{-- form3 --}}
    <div id="form3" style="display: flex; flex-direction: column; gap: 20px; align-items: center; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 5px 5px gray; width: 100%; height: 500px; margin: 0 auto 40px auto; overflow-x: hidden ;overflow-y: scroll;">
        @foreach($wishListItems as $wishListItem)
        <div>
        <form action="{{ route('settings.updateee', ['id' => $wishListItem->id]) }}" method="POST">
            @csrf

            <table class="w-full border-collapse border border-gray-300 mb-4">
                <tr>
                 <td class="p-2 font-medium">Item Name</td>
                    <td class="p-2">
                        <input type="text" name="name" id="name" value="{{ old('name', $wishListItem->name) }}" class="w-full p-2 border rounded" required>
                    </td>

                    <td class="p-2 font-medium">Target Amount (MAD)</td>
                    <td class="p-2">
                        <input type="number" name="target_amount" id="target_amount" value="{{ old('target_amount', $wishListItem->target_amount) }}" class="w-full p-2 border rounded" required>
                    </td>
                </tr>
            </table>

            <div style="display: flex; font-weight: 600; font-family: 'Poppins', sans-serif; color: white; margin-top: 20px; gap: 20px; margin-bottom: 0px">
                <button type="button" id="cancel3" Style="background-color: gray; border: 1px solid gray; box-shadow: 2px 2px black; border-radius: 5px; padding: 2px 7px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">Cancel</button>
                <button type="submit" style="background-color: #9688d9; border: 1px solid #9688d9; box-shadow: 2px 2px black; border-radius: 5px; padding: 2px 7px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'; this.setAttribute('title', 'save')" onmouseout="this.style.transform='scale(1)'; this.removeAttribute('title')">
                    <i class="fa-solid fa-floppy-disk" style="color: #ffffff;"></i>
                </button>
            </div>
        </form>
        {{-- Delete form --}}
        <form action="{{ route('settings.destroyy', ['id' => $wishListItem->id]) }}" method="POST" style="position: relative; top: -21%; left: 21%">
            @csrf
            @method('DELETE')
            <button type="submit" style="background-color: red; color: white; font-size: 16px; border: 1px solid red; box-shadow: 2px 2px black; border-radius: 5px; padding: 2px 7px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'; this.setAttribute('title', 'delete')" onmouseout="this.style.transform='scale(1)'; this.removeAttribute('title')">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
        </div>
        @endforeach
    </div>

</div>
@endsection



<script>
    // JavaScript to hide the form by default and toggle visibility
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('form1');
        const form2 = document.getElementById('form2');
        const form3 = document.getElementById('form3');
        const toggleButton = document.getElementById('toggleFormBtn');
        const toggleButton2 = document.getElementById('toggleFormBtn2');
        const toggleButton3 = document.getElementById('toggleFormBtn3');
        const closebtn = document.getElementById('cancel');
        const closebtn2 = document.querySelectorAll('#cancel2');
        const closebtn3 = document.querySelectorAll('#cancel3');

        // Hide the form by default
        form.style.display = 'none';
        form2.style.display = 'none';
        form3.style.display = 'none';

        // Toggle form visibility when the button is clicked
        toggleButton.addEventListener('click', function() {
            if (form.style.display === 'none') {
                form.style.display = 'flex';
            } else {
                form.style.display = 'none';
            }
        });

        toggleButton2.addEventListener('click', function() {
            if (form2.style.display === 'none') {
                form2.style.display = 'flex';
            } else {
                form2.style.display = 'none';
            }
        });

        toggleButton3.addEventListener('click', function() {
            if (form3.style.display === 'none') {
                form3.style.display = 'flex';
            } else {
                form3.style.display = 'none';
            }
        });

        closebtn.addEventListener('click', function() {
            form.style.display = 'none';
        });

        closebtn2.forEach(function(btn) {
            btn.addEventListener('click', function() {
                form2.style.display = 'none';
            });
        });

        closebtn3.forEach(function(btn) {
            btn.addEventListener('click', function() {
                form3.style.display = 'none';
            });
        });
    });


     setTimeout(function() {
        const alert = document.getElementById('alert');
        if (alert){
                alert.style.display = 'none';
            }
        }, 3000); // 3000ms = 3 sec

</script>
