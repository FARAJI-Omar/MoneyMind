<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expense;
use App\Models\RecurringExpense;
use App\Models\SavingGoal;
use App\Models\ExpenseCategory;
use App\Services\AIService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(AIService $aiService)
    {
        if (auth()->check()) {
            $infos = auth()->user();
            $expenses = Expense::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
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
                ->pluck('total', 'category_id')
                ->toArray(); // Convert to array to ensure it can be encoded to JSON

            $totalExpenses = Expense::where('user_id', auth()->id())->sum('price');
            $totalRecurringExpenses = RecurringExpense::where('user_id', auth()->id())->sum('price');
            $totalAllExpenses = $totalExpenses + $totalRecurringExpenses + $savingGoal;
            $balance = ($infos->salary) - $totalAllExpenses;

            $restOfBalance = $balance - $totalAllExpenses;

            // Fetch all categories
            $categories = ExpenseCategory::all();
            $categoryNames = collect([]);
            $categoryExpenses = collect([]);

            // Process each category
            foreach ($categories as $category) {
                // Only include categories that have expenses
                $categoryTotal = ($expensesByCategory[$category->id] ?? 0) + ($recurringExpensesByCategory[$category->id] ?? 0);
                if ($categoryTotal > 0) {
                    $categoryNames->push($category->name);
                    $categoryExpenses->push($categoryTotal);
                }
            }

            // If no categories have expenses, add a placeholder
            if ($categoryNames->isEmpty()) {
                $categoryNames->push('No Expenses');
                $categoryExpenses->push(0);
            }

            $salary = $infos->salary;
            $financialAdvice = $aiService->getFinancialAdvice($salary, $totalAllExpenses);

            return view('dashboard', compact(
                'financialAdvice',
                'infos',
                'expenses',
                'balance',
                'savingGoal',
                'totalExpenses',
                'totalRecurringExpenses',
                'totalAllExpenses',
                'restOfBalance',
                'categoryNames',
                'categoryExpenses',
                'recurringExpensesByCategory'
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
