<?php

namespace App\Console\Commands;

use App\Lead;
use App\Mail\EmailCron;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SecondMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:second';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Second mail sent to slc leads';

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
            ['first_mail', 1],
            ['second_mail', 0],
            ['stop', 'n']
        ])->limit(10)->get();

        $title = "Here Are Your FULL Slides from Sales Leadership Conference";
        $message = "mail.second";
        foreach ($leads as $lead){
            Mail::to($lead->email)->send(new EmailCron($lead, $title, $message));
            $lead->update(['second_mail' => 1]);
        }
        return response()->json('success', '200');
    }
}
