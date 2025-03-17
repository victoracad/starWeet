<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EmailVerification;
use Carbon\Carbon;

class DeleteExpiredVerifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verification:clear-expired';
    protected $description = 'Deleta códigos de verificação expirados';

    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        EmailVerification::where('expires_at', '<', now())->delete();
        $this->info('Registros expirados apagados!');
    }
}
