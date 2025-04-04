@include('layouts.app')
@extends('layouts.sidebar')

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

<div style="display: flex; gap: 50px; position: absolute; left: 65%">
    <button id="toggleFormBtn" class="btn btn-primary" style="background-color: lightgray; border: 2px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; font-weight: 600; font-family: 'Poppins', sans-serif; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
        <i class="fas fa-plus"></i> Add Expense
    </button>
    <button id="toggleFormBtn2" class="btn btn-primary" style="background-color: lightgray; border: 2px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; font-weight: 600; font-family: 'Poppins', sans-serif; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
        <i class="fas fa-plus"></i> Add Monthly Expense
    </button>

</div>

<div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 10;"></div>
<div id="expenseForm" style="display: none; width: 30%; height: 55%; padding: 20px; position: absolute; top: 20%; left: 35%; z-index: 20; background-color: white; display: flex; flex-direction: column; border-radius: 5px; border: 2px solid gray; box-shadow: 5px 5px black; justify-content: center; align-items: center; gap: 20px;">
    <form method="POST" action="{{ route('expenses.store') }}" style="display: flex; flex-direction: column; gap: 20px; align-items: center;">
        @csrf
        <div style="align-self: flex-end;">
            <button type="button" id="closebtn" style="color: white; position: absolute; top: 3%; right: 6%; background-color: #f63535; padding: 5px 5px; border-radius: 5px; font-weight: 600; font-size: 12px; border: 1px solid gray; box-shadow: 2px 2px black; transition: transform 0.15s ease-in-out;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                close</button>
        </div>

        <div style="display: flex; align-items: center; gap: 10px;">
            <label for="name" style="font-weight: 600; font-family: 'Poppins', sans-serif; color: #3a3a3a; width: 100px;">Expense Name</label>
            <input type="text" name="name" id="name" required style="flex: 1; border-radius: 5px">
        </div>

        <div style="display: flex; align-items: center; gap: 10px;">
            <label for="price" style="font-weight: 600; font-family: 'Poppins', sans-serif; color: #3a3a3a; width: 100px;">Amount</label>
            <input type="number" name="price" id="price" required style="flex: 1; border-radius: 5px">
        </div>

        <div style="display: flex; align-items: center; gap: 10px;">
            <label for="category" style="font-weight: 600; font-family: 'Poppins', sans-serif; color: #3a3a3a; width: 100px;">Category</label>
            <select name="category_id" id="category" required style="flex: 1; width: 200px; border-radius: 5px">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" style="font-weight: 600; font-family: 'Poppins', sans-serif; color: white; margin-top: 10%; background-color: #9688d9; border: 1px solid #9688d9; box-shadow: 5px 5px black; padding: 5px 10px; border-radius: 5px; transition: transform 0.15s ease-in-out;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
            Add Expense</button>
    </form>
</div>

<div id="recurringExpenseForm" style="display: none; width: 30%; height: 55%; padding: 20px; position: absolute; top: 20%; left: 35%; z-index: 20; background-color: white; display: flex; flex-direction: column; border-radius: 5px; border: 2px solid gray; box-shadow: 5px 5px black; justify-content: center; align-items: center; gap: 20px;">
    <form method="POST" action="{{ route('recurring-expenses.store') }}" style="display: flex; flex-direction: column; gap: 20px; align-items: center;">
        @csrf
        <div style="align-self: flex-end;">
            <button type="button" id="closebtn2" style="color: white; position: absolute; top: 3%; right: 6%; background-color: #f63535; padding: 5px 5px; border-radius: 5px; font-weight: 600; font-size: 12px; border: 1px solid gray; box-shadow: 2px 2px black; transition: transform 0.15s ease-in-out;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                close</button>
        </div>

        <div style="display: flex; align-items: center; gap: 10px;">
            <label for="name" style="font-weight: 600; font-family: 'Poppins', sans-serif; color: #3a3a3a; width: 100px;">Expense Name</label>
            <input type="text" name="name" id="name" required style="flex: 1; border-radius: 5px">
        </div>

        <div style="display: flex; align-items: center; gap: 10px;">
            <label for="price" style="font-weight: 600; font-family: 'Poppins', sans-serif; color: #3a3a3a; width: 100px;">Amount</label>
            <input type="number" name="price" id="price" required style="flex: 1; border-radius: 5px">
        </div>

        <div style="display: flex; align-items: center; gap: 10px;">
            <label for="due_date" style="font-weight: 600; font-family: 'Poppins', sans-serif; color: #3a3a3a; width: 100px;">Due Date</label>
            <div>
                <input type="number" name="due_date" id="price" required style="flex: 1; border-radius: 5px; width: 200px" min="1" max="31">
                <p style="color: gray">of each month</p>
            </div>
        </div>

        <div style="display: flex; align-items: center; gap: 10px;">
            <label for="category" style="font-weight: 600; font-family: 'Poppins', sans-serif; color: #3a3a3a; width: 100px;">Category</label>
            <select name="category_id" id="category" required style="flex: 1; width: 200px; border-radius: 5px">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" style="font-weight: 600; font-family: 'Poppins', sans-serif; color: white; margin-top: 10%; background-color: #9688d9; border: 1px solid #9688d9; box-shadow: 5px 5px black; padding: 5px 10px; border-radius: 5px; transition: transform 0.15s ease-in-out;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
            Add Expense</button>
    </form>
</div>

<div style="margin-top: 5%; height: auto; border: #e4e4e4ab solid; border-radius: 10px; overflow-x: auto; overflow-y: hidden; white-space: nowrap; padding: 0 10px 0 10px">
    <style>::-webkit-scrollbar {height: 7px;width: 12px}::-webkit-scrollbar-thumb {background-color: lightgray;border-radius: 5px;}::-webkit-scrollbar-track {background-color: white;}</style>

    <h2 style="margin: 0 0 15px 10px; font-family: 'Poppins', sans sarif; font-weight: 600; font-size: 22px">Reccuring expenses</h2>
    <div style="display: inline-flex; gap: 20px; padding-bottom: 15px">
        @foreach($recurringExpenses as $recurringExpense)
        <div style="background-color: white; width: 250px; height: 150px; border-radius: 10px; padding: 5px 0 0 15px; display: flex; flex-direction: column; align-items: start; gap: 8px">
            <h3 style="font-family: 'Poppins', sans sarif; font-weight: 600; font-size: 16px">{{$recurringExpense->name}}</h3>
            <h4 style="font-family: 'Poppins', sans sarif; font-size: 15px">{{$recurringExpense->price}} dh</h4>
            <h5 style="font-family: 'Poppins', sans sarif; font-size: 13px; background-color: #eceaea; padding: 0px 10px; border-radius: 5px">Entertainement</h5>
            <p style="font-family: 'Poppins', sans sarif; font-size: 13px">due at: {{ $recurringExpense->due_date}} {{ \Carbon\Carbon::now()->format('F') }}</p>
        </div>
        @endforeach
    </div>
</div>

<div style="margin-top: 2%; height: auto; border: #e4e4e4ab solid; border-radius: 10px; padding: 0 10px 0 10px">
    <h2 style="margin: 0 0 15px 10px; font-family: 'Poppins', sans sarif; font-weight: 600; font-size: 22px">Daily expenses</h2>

    <table style="width: 100%; font-family: Arial, sans-serif; font-size: 14px; color: #5a5a5a">
        <thead>
            <tr style="text-align: left;">
                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Amount</th>
                <th style="padding: 10px;">Category</th>
                <th style="padding: 10px;">Added on</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr style="border-bottom: 1px solid #dee2e6; background-color: white;">
                <td style="padding: 10px;">{{ $expense->name }}</td>
                <td style="padding: 10px; font-weight: bold; color: #000;">{{ $expense->price }} dh</td>
                <td style="padding: 10px;">
                    <span style="background-color: #e9ecef; padding: 4px 8px; border-radius: 4px; font-size: 12px;">{{ $expense->category->name }}</span>
                </td>
                <td style="padding: 10px; color: #8a8d91;">{{ $expense->created_at->format('d M Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<!-- Pagination Links -->
<div style="margin-top: 20px;">
    {{ $expenses->links() }}
</div>




@endsection
<script>
    // JavaScript to hide the form by default and toggle visibility
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('expenseForm');
        const form2 = document.getElementById('recurringExpenseForm');
        const toggleButton = document.getElementById('toggleFormBtn');
        const toggleButton2 = document.getElementById('toggleFormBtn2');
        const overlay = document.getElementById('overlay');
        const closebtn = document.getElementById('closebtn');
        const closebtn2 = document.getElementById('closebtn2');

        // Hide the form by default
        overlay.style.display = 'none';
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


    setTimeout(function() {
       const alert = document.getElementById('alert');
       if (alert){
               alert.style.display = 'none';
           }
       }, 3000); // 3000ms = 3 sec

</script>
