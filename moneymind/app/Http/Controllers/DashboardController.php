<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expense;
use App\Models\RecurringExpense;
use App\Models\SavingGoal;
use App\Models\ExpenseCategory;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $infos = auth()->user();
            $expenses = Expense::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
            $salary = $infos->salary;
            $savingGoal = SavingGoal::where('user_id', auth()->id())->value('monthly_deduction') ?? 0;

            // Fetch expenses grouped by category
            $expensesByCategory = Expense::where('user_id', auth()->id())
                ->selectRaw('category_id, SUM(price) as total')
                ->groupBy('category_id')
                ->pluck('total', 'category_id');

            // Fetch recurring expenses grouped by category
            $recurringExpensesByCategory = RecurringExpense::where('user_id', auth()->id())
                ->selectRaw('category_id, SUM(price) as total')
                ->groupBy('category_id')
                ->pluck('total', 'category_id');

            $totalExpenses = Expense::where('user_id', auth()->id())->sum('price');
            $totalRecurringExpenses = RecurringExpense::where('user_id', auth()->id())->sum('price');
            $totalAllExpenses = $totalExpenses + $totalRecurringExpenses + $savingGoal;
            $restOfSalary = $salary - $totalAllExpenses;

            // Fetch category names
            $categoryNames = ExpenseCategory::pluck('name', 'id');

            return view('dashboard', compact(
                'infos', 'expenses', 'salary', 'savingGoal', 'totalExpenses', 'totalRecurringExpenses',
                'totalAllExpenses', 'restOfSalary', 'expensesByCategory', 'recurringExpensesByCategory', 'categoryNames'
            ));
        }
        return redirect()->route('homepage');
    }


    public function adminIndex()
    {
        if (auth()->check()) {
            $infos = auth()->user();
            return view('admin.dashboard', compact('infos'));
        }
        return redirect()->route('homepage');
    }
}
