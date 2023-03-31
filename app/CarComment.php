<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarComment extends Model
{
    protected $table = "cars_comments";
    protected $fillable = [
        'id',
      'user_id',
        'car_id',
      'comment'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }
    public  function  car(){

        return $this->belongsTo(User_car::class, "car_id");

    }
}
