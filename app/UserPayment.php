<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    //
    protected $table = "user_payments";
    protected $fillable = [
        'id',
        'user_id',
        'access_token',
        'pay_id',
        'invoice_number',
        'create_response',
        'execute_response',
        ];

     public function package()
    {
        return $this->belongsTo('App\UserPackage', 'pay_id', 'pay_id');

    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');

    }
}