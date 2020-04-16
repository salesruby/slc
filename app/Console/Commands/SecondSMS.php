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
            ['second_sms', 0],
            ['stop', 'n'],
            ['created_at', '<=', Carbon::now()->subDay()],
        ])->get();

        $status = 'second_sms';
        foreach ($leads as $lead){
            $message = "Hi $lead->full_name \r\n".
                "Please check email. A link to download SLC slides has been sent. If not found, please check spam. To pay for videos Stanbic IBTC 0029240785 (SalesRuby Ltd)-N10,000";

            $this->sendText($lead, $message, $status);
        }

    }
}
