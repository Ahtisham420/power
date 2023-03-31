<?php
/**
 * Created by PhpStorm.
 * User: BlackWolf
 * Date: 15/05/2019
 * Time: 5:08 PM
 */

namespace App\Repository;


use App\Classes\PushNotifications;
use App\Job;
use App\JobDispatchLog;
use App\Jobs\addDispatchLogsDb;
use App\Provider;
use App\CrownJob;
use App\PPCNewsLetter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class CrownJobs
{
    public function SendEmailJob()
    {
    $result = CrownJob::where("status",0)->first();
    if (!empty($result)){
            $ppc = PPCNewsLetter::where('id',$result->mail_id)->where('status',1)->first();
            if(!empty($ppc)){
                Mail::send("frontend.mail-template",["mail"=>$ppc],function ($m) use ($result,$ppc){
                    $m->to($result->email)->subject($ppc->subject);
                      $result->status = 1;
                $result->save();
                    }
                );
            }
        }
    }
}