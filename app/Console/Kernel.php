<?php

namespace App\Console;

use App\Competition;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function() {
            $competitions = Competition::where('status', 'active')->where('finish_at', '<=', now())->get();
            foreach ($competitions as $competition) {
                $competition->status = 'finished';
                $winner_user = $competition->participants()->inRandomOrder()->first();
                if ($winner_user != null) {
                    $competition->winner_id = $winner_user->id;
                    
                }
                // Send SMS to $competition->result_phone
                $competition->save();
                // No one participated in it
            }
        })->hourly();
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
