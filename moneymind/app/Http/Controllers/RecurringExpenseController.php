<?php

namespace App\Http\Controllers;

use App\Models\RecurringExpense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class RecurringExpenseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'due_date' => 'required|numeric|between:1,31',
            'category_id' => 'required|exists:expense_categories,id',
        ]);

        RecurringExpense::create([
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('expenses')->with('success', 'Recurring expense added successfully.');
    }
}
