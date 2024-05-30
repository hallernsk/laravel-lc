<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected $message;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->message = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        info($this->message);  // запись информации в лог (storage/logs/laravel.log)
    }
}
