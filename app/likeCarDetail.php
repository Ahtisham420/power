<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class likeCarDetail extends Model
{
    protected $table = "like_cardetail";
    protected $fillable = [
      'id',
      'user_id',
        'car_id'
    ];
}
