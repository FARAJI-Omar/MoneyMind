@include('layouts.app')
@extends('layouts.sidebar')

@section('content')

<!-- Button to show/hide the form -->
<button id="toggleFormBtn" class="btn btn-primary">
    <i class="fas fa-plus"></i> Add Expense
</button>

<!-- The Form to Add Expense (Initially Hidden) -->
<div id="expenseForm" style="margin-top: 20px; display: none;">
    <form method="POST" action="{{ route('expenses.store') }}">
        @csrf

        <div>
            <label for="name">Expense Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="price" required>
        </div>

        <div>
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Add Expense</button>
    </form>
</div>

<!-- List of All Expenses -->
<div id="expensesList" style="margin-top: 40px;">
    <h2>All Expenses</h2>
    @foreach($expenses as $expense)
    <div>
        <p><strong>{{ $expense->name }}</strong> - {{ $expense->price }} MAD</p>
        <p>Category: {{ $expense->category->name }}</p>
        <p>Added on: {{ $expense->created_at->format('d M Y') }}</p>
    </div>
    @endforeach
</div>

<script>
    // JavaScript to hide the form by default and toggle visibility
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById('expenseForm');
        var toggleButton = document.getElementById('toggleFormBtn');

        // Hide the form by default
        form.style.display = 'none';

        // Toggle form visibility when the button is clicked
        toggleButton.addEventListener('click', function() {
            if (form.style.display === 'none') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        });
    });

</script>
@endsection
