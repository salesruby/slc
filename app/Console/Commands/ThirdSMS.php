<?php

namespace App\Console\Commands;

use App\Lead;
use Carbon\Carbon;

class ThirdSMS extends SMS
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:third';

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
            ['second_sms', 1],
            ['stop', 'n'],
            ['created_at', '<=', Carbon::now()->subDay(3)],
        ]);

        $status = 'third_sms';
        $message = "Welcome to salesruby, home of great sales trainings part3";
        $this->sendText($leads, $message, $status);
    }
}
