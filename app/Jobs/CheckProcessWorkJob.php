<?php

namespace App\Jobs;

use App\Models\Work;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckProcessWorkJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $work;
    public function __construct($work)
    {
        $this->work = $work;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Work::where('id', $this->work->id)->update(['status' => 'Process']);
    }

}
