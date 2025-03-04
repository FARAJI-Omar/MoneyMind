<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ExpenseCategory;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $infos = auth()->user();
            $users = User::all();
            return view('admin.dashboard', compact('infos', 'users'));
        }
        return redirect()->route('homepage');
    }

    public function manageCategories()
    {
        $categories = ExpenseCategory::paginate(9);
        return view('admin.ManageCategories', compact('categories'));
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

    public function manageUsers()
    {
        $users = User::where('role', 'user')->paginate(9);
    
        // Add the status field after pagination
        $users->getCollection()->transform(function ($user) {
            $user->status = $this->calculateUserStatus($user);
            return $user;
        });
    
        return view('admin.ManageUsers', compact('users'));
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
