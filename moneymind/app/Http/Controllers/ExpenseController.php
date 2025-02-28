<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\RecurringExpense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function create()
    {
        $categories = ExpenseCategory::all();
        $expenses = Expense::where('user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(6);
        $recurringExpenses = RecurringExpense::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('expenses', compact('categories', 'expenses', 'recurringExpenses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:expense_categories,id',
        ]);

        Expense::create([
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('expenses')->with('success', 'Expense added successfully.');
    }
}
