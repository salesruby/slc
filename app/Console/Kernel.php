<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\FirstSMS',
        'App\Console\Commands\SecondSMS',
        'App\Console\Commands\ThirdSMS',
        'App\Console\Commands\FirstMail',
        'App\Console\Commands\SecondMail',
        'App\Console\Commands\ThirdMail',
        'App\Console\Commands\FourthMail'
    ];

    /**
     * @param Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('sms:first')
//            ->everyFiveMinutes();
//
//        $schedule->command('sms:second')
//            ->hourly();
//
//        $schedule->command('sms:third')
//            ->hourly();
//
//        $schedule->command('mail:first')
//            ->everyFiveMinutes();
//
//        $schedule->command('mail:second')
//            ->everyThirtyMinutes();
//
//        $schedule->command('mail:third')
//            ->hourly();
//
//        $schedule->command('mail:fourth')
//            ->hourly();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
