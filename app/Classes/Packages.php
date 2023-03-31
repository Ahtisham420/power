<?php
/**
 * Created by PhpStorm.
 * User: BlackWolf
 * Date: 11/05/2021
 * Time: 10:52 PM
 */

namespace App\Classes;


use App\Package;
use App\UserPackage;
use Carbon\Carbon;

class Packages
{

    protected $standardPackages;
    protected $extraPackages;

    /**
     * @return array
     */
    public function getStandardPackages(): array
    {
        return $this->standardPackages;
    }

    /**
     * @return array
     */
    public function getExtraPackages(): array
    {
        return $this->extraPackages; // optional are same
    }


    /**
     * Packages constructor.
     * @param $standardPackages
     */
    public function __construct()
    {
        $this->standardPackages = [
            Package::basic,
            Package::standard,
            Package::trader,
        ];

        $this->extraPackages = [
            Package::AmericanMuscles,
            Package::GarageServices,
            Package::Rental,
            Package::BodyshopServices,
            Package::Prestige,
        ];
    }
 public static function defaultPackages($request , $user_id){

        $basic_package_id = (isset($request->package_id) && $request->package_id != 0 ) ? $request->package_id : Package::basic;
        $basic_package = Package::find($basic_package_id);
        UserPackage::create([
            'user_id' => $user_id,
            'package_id' => $basic_package_id,
            'post_per_package' => $basic_package->post_per_package,
            'free_post_per_package' => $basic_package->free_post_per_package,
            "wanted_adds"=>$basic_package->wanted_adds,
            "auction_adds"=>$basic_package->auction_adds,
            "swap_adds"=>$basic_package->swap_adds,
            "pres_adds"=>$basic_package->pres_adds,
            "misc_adds"=>$basic_package->misc_adds,
           "featured"=>$basic_package->featured,
            "class_add"=>$basic_package->class_add,
            "garage_adds"=>$basic_package->garage_adds,
            "amr_add"=>$basic_package->amr_add,
            "body_shop_adds"=>$basic_package->body_shop_adds,
            "rental_companie_adds"=>$basic_package->rental_companie_adds,
            'status' => $basic_package->status,
        ]);
        $rental_package_id = Package::Rental;
        $rental_package = Package::find($rental_package_id);
        UserPackage::create([
            'user_id' => $user_id,
            'package_id' => $rental_package_id,
            'post_per_package' => $rental_package->post_per_package,
            'free_post_per_package' => $rental_package->free_post_per_package,
            "wanted_adds"=>$rental_package->wanted_adds,
            "auction_adds"=>$rental_package->auction_adds,
            "featured"=>$rental_package->featured,
            "swap_adds"=>$rental_package->swap_adds,
            "pres_adds"=>$rental_package->pres_adds,
            "misc_adds"=>$rental_package->misc_adds,
            "garage_adds"=>$rental_package->garage_adds,
            "amr_add"=>$rental_package->amr_add,
            "body_shop_adds"=>$rental_package->body_shop_adds,
            "rental_companie_adds"=>$rental_package->rental_companie_adds,
            'status' => $rental_package->status,
        ]);
        $prestige_package_id = Package::Prestige;
        $prestige_package = Package::find($prestige_package_id);
        UserPackage::create([
            'user_id' => $user_id,
            'package_id' => $prestige_package_id,
            'post_per_package' => $prestige_package->post_per_package,
            'free_post_per_package' => $prestige_package->free_post_per_package,
            'status' => $prestige_package->status,
            "featured"=>$prestige_package->featured,
            "wanted_adds"=>$prestige_package->wanted_adds,
            "auction_adds"=>$prestige_package->auction_adds,
            "swap_adds"=>$prestige_package->swap_adds,
            "pres_adds"=>$prestige_package->pres_adds,
            "misc_adds"=>$rental_package->misc_adds,
            "garage_adds"=>$prestige_package->garage_adds,
            "amr_add"=>$prestige_package->amr_add,
            "body_shop_adds"=>$prestige_package->body_shop_adds,
            "rental_companie_adds"=>$prestige_package->rental_companie_adds,
        ]);
    }
    

    public static function updatePackage($user_package_id,$package_id,$user_id = 0){
        $package = Package::find($package_id);
        $filter[] = [
            'id' => $user_package_id,
        ];
        if($user_id != 0){
            $filter[] = [
                'user_id' => $user_id,
            ];
        }
        $p_ck = UserPackage::where('user_id',$user_id)->where('package_id',$user_package_id)->get();
      if (isset($p_ck) ){
            UserPackage::where('user_id',$user_id)->where('package_id',$user_package_id)
            ->update([
                'package_id' => $package_id,
                'post_per_package' => $package->post_per_package,
                'free_post_per_package' => $package->free_post_per_package,
                "wanted_adds"=>$package->wanted_adds,
                "auction_adds"=>$package->auction_adds,
                "swap_adds"=>$package->swap_adds,
                "pres_adds"=>$package->pres_adds,
                "featured"=>$package->featured,
                "misc_adds"=>$package->misc_adds,
                "garage_adds"=>$package->garage_adds,
                "amr_add"=>$package->amr_add,
                "body_shop_adds"=>$package->body_shop_adds,
                "rental_companie_adds"=>$package->rental_companie_adds,
                'status' => $package->status,
            ]);
    }
    
        
    }

    public static function checkStandardPackage($user_id){
        $packages = new Packages();
        $userPackage = UserPackage::with('u_package')->where('user_id',"=", $user_id)->whereIn("package_id",$packages->standardPackages)->first();
        return $userPackage;
    }
    public  static  function  FeaturedPackageCount(){
           $user_f_pkg = UserPackage::where("user_id",session('userDetails')->id)->where('package_id',15)->where('paid_status',1)->where('featured','>',0)->first();
           if ($user_f_pkg){
               $user_f_pkg->featured = UserPackage::disabled;
               if($user_f_pkg->save()){
                   return 'okay';
                   }
           }

    }
    public static function checkExtraPackages($user_id){
        $packages = new Packages();
        $userPackage = UserPackage::where('user_id',"=", $user_id)->whereIn("package_id",$packages->extraPackages)->get();
        return $userPackage;
    }



    public static function checkSingleExtraPackage($package_id,$user_id){
        $userPackage = UserPackage::where('user_id',"=", $user_id)->where("package_id",$package_id)->first();
        return $userPackage;
    }

    public  static  function  CheckPackageName($pkg_name){
        $pack_name = UserPackage::where('user_id',"=", $user_id)->where("package_id",$package_id)->first();
        
        return $pack_name;
    }

    public  static  function  CheckPackageAvalibillity(){
        $package=UserPackage::selectraw("packages.*,users_packages.no_of_times")->join("packages","users_packages.package_id","=","packages.id")->where("users_packages.user_id",session('userDetails')->id)->where("users_packages.status",1)->where("users_packages.post_per_package",">",0)->get();
        return $package;
    }

    public static function upgradePackage($user_package_id,$package_id,$user_id = 0){
        $package = Package::find($package_id);
        $filter[] = [
            'id' => $user_package_id,
        ];
        if($user_id != 0){
            $filter[] = [
                'user_id' => $user_id,
            ];
        }
        $user_packages = UserPackage::find($user_package_id);
        UserPackage::where($filter)
            ->update([
                'package_id' => $package_id,
                'post_per_package' => $package->post_per_package,
                'free_post_per_package' => $package->free_post_per_package,
                'status' => $package->status,
                'no_of_times' => $user_packages->no_of_times + 1,
            ]);
    }

    public static function getUserPackageStatus($package_id,$user_id){
        $usr_pkg = UserPackage::where("package_id",$package_id)
            ->where("user_id",$user_id)
            ->where("post_per_package",">",0)
            ->whereNull("ending_paid_date")
            ->first();
        return $usr_pkg;
    }
    
      public static function  PackageAvail($category){
        $package=UserPackage::with('package')->where('user_id',session('userDetails')->id)->get();
        //selectraw("packages.*,users_packages.no_of_times")->join("packages","users_packages.package_id","=","packages.id")->where("users_packages.user_id",session('userDetails')->id)->where("users_packages.status",1)->where("users_packages.post_per_package",">",0)->get();
        foreach ($package as $p){
               if ($category === "Auction"){
                   if ($p->auction_adds != 0){
                       $count_pack = UserPackage::find($p->id);
                       $count_pack->auction_adds = $count_pack->auction_adds - 1;
                       if ($count_pack->save()){
                           return $p->package_id;
                       }
                   }
               }else if ($category === "Swap"){
                   if ($p->swap_adds != 0 ){
                       $count_pack = UserPackage::find($p->id);
                       $count_pack->swap_adds = $count_pack->swap_adds - 1;
                       if ($count_pack->save()){
                           return $p->package_id;
                       }
                   }
               }else    if ($category === "Prestige"){
                   if ($p->pres_adds != 0){
                       $count_pack = UserPackage::find($p->id);
                       $count_pack->pres_adds = $count_pack->pres_adds - 1;
                       if ($count_pack->save()){
                           return $p->package_id;
                       }
                   }
               }else    if ($category === "Rent"){
                   if ($p->rental_companie_adds != 0 ){
                       $count_pack = UserPackage::find($p->id);
                       $count_pack->rental_companie_adds = $count_pack->rental_companie_adds - 1;
                       if ($count_pack->save()){
                           return $p->package_id;
                       }
                   }
               }else    if ($category === "garage"){
                   if ($p->garage_adds != 0 ){
                       $count_pack = UserPackage::find($p->id);
                       $count_pack->garage_adds = $count_pack->garage_adds - 1;
                       if ($count_pack->save()){
                           return $p->package_id;
                       }
                   }
               }else    if ($category === "wanted"){
                   if ($p->wanted_adds != 0){
                       $count_pack = UserPackage::find($p->id);
                       $count_pack->wanted_adds = $count_pack->wanted_adds - 1;
                       if ($count_pack->save()){
                           return $p->package_id;
                       }
                   }
               }else if ($category === "misc"){
                   if ($p->misc_adds != 0){
                       $count_pack = UserPackage::find($p->id);
                       $count_pack->misc_adds = $count_pack->misc_adds - 1;
                       if ($count_pack->save()){
                           return $p->package_id;
                       }
                   }
               }

               }
               return false;
    }


    public  static function  CountStandardPackage($id){
        $count_pack = UserPackage::find($id);
        if(!empty($count_pack->starting_paid_date)){
                if($count_pack->free_post_per_package > 0){
            $count_pack->free_post_per_package = $count_pack->free_post_per_package - 1;
            if($count_pack->save()){
                return 'Okay';
            }
        }else{
            if( $count_pack->post_per_package > 0){
                $count_pack->post_per_package = $count_pack->post_per_package - 1;
                if($count_pack->save()){
                    return 'Okay';
                }
            }
        }
        }else{
            
             if($count_pack->free_post_per_package > 0){
            $count_pack->free_post_per_package = $count_pack->free_post_per_package - 1;
            if($count_pack->save()){
                return 'Okay';
            }
        }
            
        }
    


    }
}