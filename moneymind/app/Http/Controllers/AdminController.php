<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expense;
use App\Models\RecurringExpense;
use App\Models\ExpenseCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $infos = Auth::user();
            $users = User::all();

            // Get stats for dashboard
            $stats = $this->getStats();

            return view('admin.dashboard', compact('infos', 'users', 'stats'));
        }
        return redirect()->route('homepage');
    }

    /**
     * Get statistics for admin dashboard
     *
     * @return array
     */
    public function getStats()
    {
        // Get total users count
        $totalUsers = User::where('role', 'user')->count();

        // Get active/inactive users count
        $activeUsers = User::where('role', 'user')
            ->where(function ($query) {
                $query->where('last_login_at', '>', Carbon::now()->subHours(24))
                    ->orWhere('created_at', '>', Carbon::now()->subHours(24));
            })
            ->count();
        $inactiveUsers = $totalUsers - $activeUsers;

        // Get average salary
        $averageSalary = User::where('role', 'user')->avg('salary') ?? 0;

        // Get new users per month for the last 6 months
        $newUsersPerMonth = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $count = User::where('role', 'user')
                ->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
            $newUsersPerMonth[] = [
                'month' => $month->format('M'),
                'count' => $count
            ];
        }

        // Get current month new users
        $currentMonthNewUsers = User::where('role', 'user')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        // Get category distribution with percentages
        $categories = ExpenseCategory::all();
        $categoryData = [];
        $totalExpensesCount = 0;

        // First, calculate the total number of expenses across all categories
        foreach ($categories as $category) {
            $expensesCount = Expense::where('category_id', $category->id)->count();
            $recurringExpensesCount = RecurringExpense::where('category_id', $category->id)->count();
            $totalExpensesCount += ($expensesCount + $recurringExpensesCount);
        }

        // Then calculate the percentage for each category
        foreach ($categories as $category) {
            $expensesCount = Expense::where('category_id', $category->id)->count();
            $recurringExpensesCount = RecurringExpense::where('category_id', $category->id)->count();
            $categoryTotal = $expensesCount + $recurringExpensesCount;

            // Calculate percentage (avoid division by zero)
            $percentage = $totalExpensesCount > 0 ? round(($categoryTotal / $totalExpensesCount) * 100, 1) : 0;

            $categoryData[] = [
                'name' => $category->name,
                'count' => $categoryTotal,
                'percentage' => $percentage
            ];
        }

        // Get daily active users for the last 10 days
        $dailyActiveUsers = [];
        for ($i = 9; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $count = User::where('role', 'user')
                ->whereDate('last_login_at', $date->toDateString())
                ->count();
            $dailyActiveUsers[] = [
                'date' => $date->format('d M'),
                'count' => $count
            ];
        }

        // Get user growth (cumulative users over time)
        $userGrowth = [];
        $months = 12; // Last 12 months

        for ($i = $months - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $count = User::where('role', 'user')
                ->where('created_at', '<', $date->endOfMonth())
                ->count();
            $userGrowth[] = [
                'month' => $date->format('M Y'),
                'count' => $count
            ];
        }

        return [
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'inactiveUsers' => $inactiveUsers,
            'averageSalary' => $averageSalary,
            'newUsersPerMonth' => $newUsersPerMonth,
            'currentMonthNewUsers' => $currentMonthNewUsers,
            'categoryDistribution' => $categoryData,
            'dailyActiveUsers' => $dailyActiveUsers,
            'userGrowth' => $userGrowth
        ];
    }

    public function manageCategories()
    {
        $categories = ExpenseCategory::paginate(9);
        return view('admin.manageCategories', compact('categories'));
    }

    public function categoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ExpenseCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Category added successfully.');
    }

    public function categoryDestroy($id)
    {
        $category = ExpenseCategory::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    public function manageUsers(Request $request)
    {
        // Get the status filter from the request
        $statusFilter = $request->query('status');

        // Start with the base query
        $query = User::where('role', 'user');

        // If we're filtering by status, we need to get all users first
        // because status is calculated, not stored in the database
        if ($statusFilter) {
            // Get all users
            $allUsers = User::where('role', 'user')->get();

            // Calculate status for each user
            $filteredUsers = $allUsers->filter(function ($user) use ($statusFilter) {
                $status = $this->calculateUserStatus($user);
                return strtolower($status) === strtolower($statusFilter);
            });

            // Add the status field to each user
            $filteredUsers->transform(function ($user) {
                $user->status = $this->calculateUserStatus($user);
                return $user;
            });

            // Paginate the filtered results manually
            $page = $request->query('page', 1);
            $perPage = 9;
            $users = new \Illuminate\Pagination\LengthAwarePaginator(
                $filteredUsers->forPage($page, $perPage),
                $filteredUsers->count(),
                $perPage,
                $page,
                ['path' => $request->url(), 'query' => $request->query()]
            );
        } else {
            // No filter, use normal pagination
            $users = $query->paginate(9);

            // Add the status field after pagination
            $users->getCollection()->transform(function ($user) {
                $user->status = $this->calculateUserStatus($user);
                return $user;
            });
        }

        return view('admin.manageUsers', compact('users', 'statusFilter'));
    }


    public function calculateUserStatus($user)
    {
        $lastLogin = Carbon::parse($user->last_login_at);
        return $lastLogin->diffInMinutes(Carbon::now()) > 5 ? 'inactive' : 'active';
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
