<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SavingGoal;

class SavingGoalController extends Controller
{
    public function create()
    {
        $savingGoal = SavingGoal::where('user_id', auth()->id())->first();
        return view('savingGoal', compact('savingGoal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'target_amount' => 'required|numeric|min:0',
            'monthly_deduction' => 'required|numeric|min:0',
        ]);

        SavingGoal::create([
            'target_amount' => $request->target_amount,
            'monthly_deduction' => $request->monthly_deduction,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('savingGoal')->with('success', 'Saving goal added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'target_amount' => 'required|numeric|min:0',
            'monthly_deduction' => 'required|numeric|min:0',
        ]);

        $savingGoal = SavingGoal::findOrFail($id);
        $savingGoal->target_amount = $request->target_amount;
        $savingGoal->monthly_deduction = $request->monthly_deduction;
        $savingGoal->user_id = auth()->id();
        $savingGoal->save();

        return redirect()->route('savingGoal')->with('success', 'Saving goal updated successfully.');
    }
}
