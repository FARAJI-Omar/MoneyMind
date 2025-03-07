<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\SalaryCredited;
use Illuminate\Support\Facades\Mail;

class CreditSalary extends Command
{
    protected $signature = 'salary:credit';
    protected $description = 'Credits salary to users on their credit day';

    public function handle()
    {
        $today = Carbon::now()->day; // Get today's day

        // Find users whose credit day matches today
        $users = User::where('credit_day', $today)->get();

        foreach ($users as $user) {
            $user->update([
                'balance' => $user->salary,
            ]);

            // Send email to the user
            Mail::to($user->email)->send(new SalaryCredited($user, $user->salary));
        }

        $this->info('Salaries credited successfully and emails sent.');
    }
}
