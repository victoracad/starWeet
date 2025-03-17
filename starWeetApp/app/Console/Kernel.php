<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define os comandos Artisan customizados do aplicativo.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Define as tarefas agendadas.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('verification:clear-expired')->everyTenMinutes();
    }
}
