<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\CreditSalary::class,
        Commands\DeductRecurringExpenses::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('salary:credit')->dailyAt('00:05');
        $schedule->command('RecurringExpense:deduct')->dailyAt('00:05');
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
    }
}

