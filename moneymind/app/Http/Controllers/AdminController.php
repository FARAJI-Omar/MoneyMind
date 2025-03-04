<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ExpenseCategory;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $infos = auth()->user();
            $users = User:: all();
            return view('admin.dashboard', compact('infos', 'users'));
        }
        return redirect()->route('homepage');
    }

    public function manageCategories(){
        $categories = ExpenseCategory::paginate(9);
        return view('admin.ManageCategories', compact('categories'));
    }

    public function categoryStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ExpenseCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Category added successfully.');
    }

    public function categoryDestroy($id){
        $category = ExpenseCategory::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
