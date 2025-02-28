@include('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div>
    @if(session('success'))
    <div class="p-2 mb-4 bg-green-200 text-green-800 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div>
        <button id="toggleFormBtn" class="btn btn-primary" style="background-color: lightgray; border: 2px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; font-weight: 600; font-family: 'Poppins', sans-serif; width: 100%; height: 50px; margin-bottom: 30px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'"">
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
                <button type="submit" Style="background-color: gray; border: 1px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
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
    <div id="form2" style="display: flex; flex-direction: column; gap: 20px; align-items: center; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 5px 5px gray; width: 100%; height: 300px; margin: 0 auto 40px auto; overflow-x: hidden ;overflow-y: scroll;">
        @foreach($recurringExpenses as $recurringExpense)
        <h2 class="text-xl font-bold mb-4" style="width: 100%; margin-left: 15%; font-weight: bold; font-size: 20px; margin-bottom: -10px">{{ $recurringExpense->name }}</h2>
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
                        <input type="date" name="due_date" id="due_date"                                                         class="w-full p-2 border rounded" required min="1" max="31">
                    </td>

                    <td class="p-2 text-center">
                        <button type="button" class="bg-red-600 text-white px-4 py-2 rounded shadow-md" style="transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                            Delete
                        </button>
                    </td>
                </tr>
            </table>

            <div style="display: flex; font-weight: 600; font-family: 'Poppins', sans-serif; color: white; margin-top: 20px; gap: 20px">
                <button type="button" id="cancel2" Style="background-color: gray; border: 1px solid gray; box-shadow: 2px 2px black; border-radius: 5px; padding: 2px 7px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">Cancel</button>
                <button type="submit" style="background-color: gray; border: 1px solid gray; box-shadow: 2px 2px black; border-radius: 5px; padding: 2px 7px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    Save
                </button>
            </div>
        </form>
        @endforeach
    </div>

</div>
@endsection



<script>
    // JavaScript to hide the form by default and toggle visibility
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('form1');
        const form2 = document.getElementById('form2');
        const toggleButton = document.getElementById('toggleFormBtn');
        const toggleButton2 = document.getElementById('toggleFormBtn2');
        {{-- const overlay = document.getElementById('overlay'); --}}
        const closebtn = document.getElementById('cancel');
        const closebtn2 = document.getElementById('cancel2');

        // Hide the form by default
        {{-- overlay.style.display = 'none'; --}}
        form.style.display = 'none';
        form2.style.display = 'none';

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

        toggleButton2.addEventListener('click', function() {
            if (form2.style.display === 'none') {
                form2.style.display = 'flex';
                overlay.style.display = 'block';
            } else {
                form2.style.display = 'none';
                overlay.style.display = 'none';
            }
        });


        closebtn.addEventListener('click', function() {
            form.style.display = 'none';
            overlay.style.display = 'none';
        });

        closebtn2.addEventListener('click', function() {
            form2.style.display = 'none';
            overlay.style.display = 'none';
        });
    });

</script>
