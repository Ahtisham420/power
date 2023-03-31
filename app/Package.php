<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public const main = "main";
    public const extra = "optional";
    public const optional = "optional";
    public const feature = "feature";


    public const per_day = 1;
    public const per_month = 2;
    public const per_year = 3;
    public const per_car = 4;

    public  const  true = 1;
    public  const  false = 0;

    public const basic = 2;
    public const standard = 4;
    public const trader = 5;

    public const AmericanMuscles = 6;
    public const GarageServices = 13;
    public const Rental = 14;
    public const Feature = 15; // extra
    public const BodyshopServices = 16;
    public const Prestige = 17;

    protected $table = "packages";

    protected $fillable = [
        'id',
        'name',
        'tagline',
        'price',
        'duration',
        'off_percentage',
        'off_bit',
        'attributes',
        'type',
        'extra',
        'role',
        'status',
        'auction_adds',
        'wanted_adds',
        'swap_adds',
        'pres_adds',
        'misc_adds',
        'garage_adds',
        'body_shop_adds',
        'rental_companie_adds',
        'prestige_deal_adds',
        'amr_add',
       'featured',
        'class_add',
        'post_per_package',
        'free_post',
        'free_post_per_package',
    ];

    public static function scopeSearch($query, $string,$columns = [])
    {
        $query->where(function($q) use ($string,$columns) {
            foreach ($columns as $field) {
                $q->orWhere($field, 'LIKE',  '%'.$string.'%');
            }
        });
    }
    public function userpackages()
    {
        return $this->hasMany('App\UserPackage', 'package_id', 'id');
    }
}
