<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Jobs\DispatchReport;


class DispatchEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dispatch-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'command to generate excel and attach as email to dispatch it';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dispatchReport = new DispatchReport;
        dispatch($dispatchReport);

        return Command::SUCCESS;
    }
}
