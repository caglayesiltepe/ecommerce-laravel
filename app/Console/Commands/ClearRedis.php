<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class ClearRedis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush all Redis data';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Redis::flushall();
        $this->info('✅ Redis cache has been cleared successfully.');
    }
}
