<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeImage extends Model
{
    protected $table="home_image";
    protected $fillable = [
        'id',
        'user_id',
        'image'
    ];
}
