<?php

namespace App\Jobs;

use App\Components\ImportDataClient;
use App\Models\Work;
use App\Http\Resources\WorkResource;
use Carbon\Carbon;
use GuzzleHttp\Client;
use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckWorkJob implements ShouldQueue
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
        Work::where('id', $this->work->id)->update(['status'=>'Success']);
    }
}
