<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RecurringExpense;
use App\Models\User;
use App\Models\ExpenseCategory;

class SettingsController extends Controller
{
    // Show salary settings page
    public function index()
    {
        $user = auth()->user();
        $categories = ExpenseCategory::all();
        $recurringExpenses = RecurringExpense::where('user_id', auth()->id())->get();
        return view('settings', compact('recurringExpenses', 'user', 'categories'));
    }

    // Update salary and credit day
    public function update(Request $request)
    {
        $request->validate([
            'salary' => 'required|numeric|min:0',
            'credit_day' => 'required|integer|min:1|max:31'
        ]);

        $user = Auth::user();
        $user->salary = $request->salary;
        $user->credit_day = $request->credit_day;
        $user->save();

        return redirect()->back()->with('success', 'Salary updated successfully!');
    }

    // Update recurring expense
    public function updatee(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:expense_categories,id',
            'due_date' => 'required|date',
        ]);

        $recurringExpense = RecurringExpense::findOrFail($id);
        $recurringExpense->price = $request->amount;
        $recurringExpense->category_id = $request->category_id;
        $recurringExpense->due_date = $request->due_date;
        $recurringExpense->save();

        return redirect()->back()->with('success', 'Recurring expense updated successfully!');
    }

    public function destroy($id)
    {
        $recurringExpense = RecurringExpense::findOrFail($id);
        $recurringExpense->delete();

        return redirect()->back()->with('success', 'Recurring expense deleted successfully.');
    }
}
