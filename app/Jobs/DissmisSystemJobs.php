<?php

namespace App\Jobs;

use App\Repository\DispatchJobRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DissmisSystemJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $jobId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($jobId)
    {
        //
        $this->jobId = $jobId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        DispatchJobRepository::dissmisJob($this->jobId);
    }
}
