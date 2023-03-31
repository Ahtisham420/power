<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\CarSetting;

class User_car extends Authenticatable
{
    use Notifiable;
	protected $table="user_cars";
protected $appends = ['Availability','AvailabilitySafety'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
static public function Leasecars($type){
   return  User_car::Where('car_availbilty',$type)->get();
}

        public  function  CarAuction(){
            return $this->hasOne(AuctionBid::class,"car_id")->orderBy('bid_amount','desc');
        }

    public function getAvailabilityAttribute()
    {
        $enter = [];
        if (!empty($this->ent_f) && $this->ent_f != null){

           $ent = json_decode($this->ent_f);
           foreach ($ent as $es){
               $enter[]=  CarSetting::find($es);
               }
           }

       return $enter;
    }
    public function getAvailabilitySafetyAttribute()
    {
        $saftey = [];
        if (!empty($this->saftey_f) && $this->saftey_f != null){
            $safe = json_decode($this->saftey_f);
           foreach ($safe as $ef){
               $saftey[]=  CarSetting::find($ef);
           }
       }
       return $saftey;
    }
//    public function Featture()
//    {
//        return $this->CarSetting()
//            ->where('id', User_car::all())
//            ->exists();
//    }

        public  function  ent(){
          return $this->belongsTo(CarSetting::class,"ent_f");
        }
    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }
    public function entertainment_feature()
    {
        return $this->belongsTo(CarSetting::class,"ent_f");
    }
   public function engine_type()
    {
        return $this->belongsTo(CarSetting::class,"engine_type");
    }
    public function enginetype()
    {
        return $this->belongsTo(CarSetting::class,"engine_type");
    }
	 public function color()
    {
        return $this->belongsTo(CarSetting::class,"color");
    }
	 public function parking_sensor()
    {
        return $this->belongsTo(CarSetting::class,"parking_sensor");
    }
	 public function exhaust()
    {
        return $this->belongsTo(CarSetting::class,"exhaust");
    }
	 public function car_type()
    {
        return $this->belongsTo(CarSetting::class,"car_type");
    }
    public function cartype()
    {
        return $this->belongsTo(CarSetting::class,"car_type");
    }
	 public function body_type()
    {
        return $this->belongsTo(CarSetting::class,"body_type");
    }

    public function model()
    {
        return $this->belongsTo(CarSetting::class,"modal");
    }
    public function d_model()
    {
        return $this->belongsTo(CarSetting::class,"modal");
    }
    public  function  variant_rel(){
        return $this->belongsTo(CarSetting::class,"variant");
     }

    public function brand()
    {
        return $this->belongsTo(Brand::class,"brand");
    }
    public function d_brand()
    {
        return $this->belongsTo(Brand::class,"brand");
    }


    public function car_make()
    {
        return $this->belongsTo(CarSetting::class,"car_make");
    }
    public function carmake()
    {
        return $this->belongsTo(CarSetting::class,"car_make");
    }

    public static function scopeSearch($query, $string,$columns = [])
    {
        $query->where(function($q) use ($string,$columns) {
            foreach ($columns as $field) {
                $q->orWhere($field, 'LIKE',  '%'.$string.'%');
            }
        });
    }


}
