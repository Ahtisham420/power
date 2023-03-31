<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarageRating extends Model
{
    //
    protected $table = 'garage_rating';
    protected $fillable = [
      'id',
      'user_id',
        'car_id',
        'rating'
    ];
}
