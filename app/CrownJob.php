<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrownJob extends Model
{
    //
    protected $table = 'crown_mails';
    protected $fillable = ['id','email','mail_id'];
}
