<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\Investment;
use Illuminate\Console\Command;

class InvestmentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invest:up';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Investment up';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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
    }
}
