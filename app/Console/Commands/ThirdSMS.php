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
            ['third_sms', 0],
            ['stop', 'n'],
            ['created_at', '<=', Carbon::now()->subDay(3)],
        ])->get();

        $status = 'third_sms';
        foreach ($leads as $lead){
            $message = "Hello $lead->full_name \r\n".
                "15 High Value Productivity Sessions and 6 other things you get from SLC video. Check email. To pay for videos Stanbic IBTC 0029240785 (SalesRuby Ltd)-N10,000
                   ";

            $this->sendText($lead, $message, $status);
        }

    }
}
