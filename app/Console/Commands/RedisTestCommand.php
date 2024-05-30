<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Redis;

class RedisTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:redis-go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test redis';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $redis = new Redis();
        $redis->set('keyREDIS2', 'valueREDIS5');
        $redis->lPush('my_list', 'value1', 'value2', 'value3', 'value4', 'value5');
    }
}
