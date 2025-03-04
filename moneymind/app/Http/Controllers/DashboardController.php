<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Expense;
use App\Models\RecurringExpense;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $infos = auth()->user();
            $expenses = Expense::where('user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(6);
            return view('dashboard', compact('infos', 'expenses'));
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
