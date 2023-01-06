<?php

namespace App\Console;

use App\Http\Controllers\InvestmentController;
use App\Models\Account;
use App\Models\Investment;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            $investments = Investment::all();

            $accounts = Account::all();

            foreach ($accounts as $account) {
                if($account->type == 'I'){
                    $account->balance = $account->balance * 1.002;
                    $account->update();
                }
            }

            foreach ($investments as $investment) {
                $investment->amount = $investment->amount * 1.002;
                $investment->update();
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
