<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $table = "brands";
    protected $fillable = [
        'id',
        'name'
    ];
    public  function garageBrand(){
     return $this->hasMany('App\Wanted','brand','id');
 }

}
