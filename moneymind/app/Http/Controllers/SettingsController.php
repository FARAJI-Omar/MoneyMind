<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    // Show salary settings page
    public function index()
    {
        return view('settings', ['user' => Auth::user()]);
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
}
