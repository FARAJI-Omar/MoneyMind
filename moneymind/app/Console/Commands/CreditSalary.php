<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreditSalary extends Command
{
    protected $signature = 'salary:credit';
    protected $description = 'Credits salary to users on their credit day';

    public function handle()
    {
        $today = Carbon::now()->day; // Get current day

        // Find users whose credit day matches today
        $users = User::where('credit_day', $today)->get();

        foreach ($users as $user) {
            $user->update([
                'balance' => $user->balance + $user->salary, // Add salary to balance
            ]);
        }

        $this->info('Salaries credited successfully.');
    }
}
