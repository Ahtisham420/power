<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuctionBid extends Model
{
    protected $table = 'auction_bid';
    protected $fillable = [
        'id',
        'user_id',
        'car_id',
        'bid_amount'
    ];
}
