<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    //
    protected $table = "followers";
    protected $fillable = ['id','follow_from','	follow_to'];
}
