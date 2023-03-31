<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarRating extends Model
{
    //
    protected $table = 'cars_rating';
    protected $fillable = [
      'id',
      'user_id',
      'car_id',
        'rating'
    ];
}
