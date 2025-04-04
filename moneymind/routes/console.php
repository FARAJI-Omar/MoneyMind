<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


app(Schedule::class)->command('salary:credit')->daily();
app(Schedule::class)->command('RecurringExpense:deduct')->daily();