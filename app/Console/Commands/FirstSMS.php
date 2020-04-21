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
        $leads = Lead::where([
            ['first_sms', 0],
            ['stop', 'n']
        ])->limit(5)->get();

        $status = 'first_sms';

        foreach($leads as $lead){
            $message = "Hello $lead->full_name, \r\n".
                "Thanks for your interest in Sales Leadership Conference 2020 videos and slides. Please check email. The Free slides have been sent to you. Check spam if not found inbox.
            \r\n".
            "For more info please contact 09070047691 or 09070047690";
            $this->sendText($lead, $message, $status);
        }
    }
}
