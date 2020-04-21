<?php

namespace App\Console\Commands;

use App\Lead;
use App\Mail\EmailCron;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ThirdMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:third';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Third Email';

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
            ['second_mail', 1],
            ['third_mail', 0],
            ['stop', 'n'],
            ['created_at', '<=', Carbon::now()->subDay()]
        ])->limit(20)->get();

        $title = "Have You Got Your Slides & Videos?";
        $message = "mail.third";
        foreach ($leads as $lead){
            Mail::to($lead->email)->send(new EmailCron($lead, $title, $message));
            $lead->update(['third_mail' => 1]);
        }
        return response()->json('success', '200');
    }
}
