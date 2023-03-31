<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchRecent extends Model
{
    //
    protected $table = "recent_search";
    protected $fillable = [
        'id',
        'car_id',
        'cookie_name'
    ];

    public  function  recent_car(){
        return $this->belongsTo(User_car::class,"car_id");
    }
}
