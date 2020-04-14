<?php

namespace App\Console\Commands;

use App\Lead;
use Carbon\Carbon;

class SecondSMS extends SMS
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:second';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $leads = Lead::where([
                            ['first_sms', 1],
                            ['stop', 'n'],
                            ['created_at', '<=', Carbon::now()->subDay()],
                            ]);
        $status = 'second_sms';
        $message = "Welcome to salesruby, home of great sales trainings part2";
        $this->sendText($leads, $message, $status);
    }
}
