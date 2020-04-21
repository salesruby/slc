<?php

namespace App\Console\Commands;

use App\Lead;
use App\Mail\EmailCron;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class FourthMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:fourth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fourth Email';

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
            ['third_mail', 1],
            ['fourth_mail', 0],
            ['stop', 'n'],
            ['created_at', '<=', Carbon::now()->subDay(3)]
        ])->limit(20)->get();

        $title = "Here Is What You Have Been Missing";
        $message = "mail.fourth";
        foreach ($leads as $lead){
            Mail::to($lead->email)->send(new EmailCron($lead, $title, $message));
            $lead->update(['fourth_mail' => 1]);
        }
        return response()->json('success', '200');
    }
}
