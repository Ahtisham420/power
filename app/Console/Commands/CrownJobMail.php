<?php

namespace App\Console\Commands;

use App\Classes\PushNotifications;
use App\Job;
use App\Mail\defaultNotify;
use App\Repository\CrownJobs;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CrownJobMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CrownJobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mail will send using this email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        dump("handler");
        $jobs = new CrownJobs();
        $jobs->SendEmailJob();
   
    }
}
