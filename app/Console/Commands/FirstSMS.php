<?php

namespace App\Console\Commands;

use App\Lead;

class FirstSMS extends SMS
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:first';

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
        $leads = Lead::where('first_sms', 0);
        $status = 'first_sms';
        $message = "Welcome to salesruby, home of great sales trainings part1";
        $this->sendText($leads, $message, $status);
    }
}
