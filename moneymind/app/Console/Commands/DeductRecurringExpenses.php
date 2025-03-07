<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RecurringExpense;
use App\Models\User;
use Carbon\Carbon;

class DeductRecurringExpenses extends Command
{
    protected $signature = 'RecurringExpense:deduct';
    protected $description = 'Deducts recurring expenses from user balance on their due date';

    public function handle()
    {
        $today = Carbon::now()->day;

        // Find users with recurring expenses due today
        $recurringExpenses = RecurringExpense::where('due_date', $today)->get();

        foreach ($recurringExpenses as $Rexpense) {
            $user = User::find($Rexpense->user_id);
            if ($user) {
                $user->update([
                    'balance' => $user->balance - $Rexpense->price,
                ]);
            }
        }

        $this->info('Recurring expenses have been deducted successfully for this month.');
    }
}
