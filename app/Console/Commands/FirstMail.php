<?php

namespace App\Console\Commands;

use App\Lead;
use App\Mail\EmailCron;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class FirstMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:first';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends first email to lead';

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
            ['first_mail', 0],
            ['stop', 'n']
        ])->limit(5)->get();


        $title = "Your Subscription to Videos of Sales Leadership Conference by SalesRuby";
        $message = "mail.first";
        foreach ($leads as $lead){
            Mail::to($lead->email)->send(new EmailCron($lead, $title, $message));
            $lead->update(['first_mail' => 1]);
        }
        return response()->json('success', '200');
    }
}
