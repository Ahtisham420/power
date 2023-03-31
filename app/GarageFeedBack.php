<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarageFeedBack extends Model
{
    protected $table = 'garage_feedback';
    protected $fillable = [
      'id',
        'user_id',
        'garage_id',
        'feedback'

    ];
    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }
}
