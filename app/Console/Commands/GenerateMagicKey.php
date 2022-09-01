<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class GenerateMagicKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'magic:key';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Magic Key';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::chunk(200, function ($users) {
            foreach ($users as $user) {
                $user->generateMagicKey();
            }
        });
    }
}
