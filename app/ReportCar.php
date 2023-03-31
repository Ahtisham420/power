<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportCar extends Model
{
    protected $table = 'report_cars';
    protected $fillable = [
        'id',
        'user_id',
        'car_id',
        'reason'
    ];
    //
     public  function  car(){

        return $this->belongsTo(User_car::class, "car_id");

    }
     public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }
}
