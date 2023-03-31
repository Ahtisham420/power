<?php


namespace App\Http\Controllers;


use App\GarageAdvert;

use App\Misecellinous;

use App\Classes\PayPal;

use App\Package;

use App\UserPayment;

use App\User;

use App\CarSetting;

use App\UserPackage;

use App\User_car;

use App\UserPackagePostLimit;

use App\Classes\Packages;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;


use App\Wanted;

use App\CarComment;

use App\Followers;

use  App\AuctionBid;

use App\likeCarDetail;

use App\Swap;

use App\CarRating;

use App\ReportCar;


class FrontendUserController extends Controller

{

    function __construct()

    {

        $this->middleware(['checkuserloggedin', 'UserStatus'])->except("swapCreate", "CarDetail");

    }


    function userDashboard($tab, $id = null)

    {


        // var_dump($tab,$id,$g_id,$w_id);

        $update = null;

        $w_edit = null;

        $g_edit = null;

        $misc_edit = null;


        if ($id) {

            $id = base64_decode($id);

            if ($tab === "wantedsection") {

                $w_edit = Wanted::find($id);

                //dd($w_edit);

            } else if ($tab === "garageadvert") {

                $g_edit = GarageAdvert::find($id);

            } else if ($tab === "edit") {

                $id = base64_decode($id);

                $update = User_car::find($id);

            } else if ($tab === "miscellaneous") {


                $misc_edit = Misecellinous::find($id);

            }

        }


        $user_packge_id = null;

        $user_package = UserPackage::where('user_id', '=', session('userDetails')->id)->with("package")->first();

        if ($user_package) {

            $user_packge_id = $user_package->package_id;

        } else {

            $package = UserPackage::create([

                'user_id' => session('userDetails')->id,

                'package_id' => 2,

                'status' => 1,

            ]);

        }


        $packages = Package::all();

        $engine_type = CarSetting::where("_key", "=", "engine-types")->get();

        $exhaust = CarSetting::where("_key", "=", "exhaust")->get();

        $colors = CarSetting::where("_key", "=", "colors")->get();

        $matt_paint = CarSetting::where("_key", "=", "matt-paint")->get();

        $wheel_size = CarSetting::where("_key", "=", "wheel-size")->get();

        $parking_sensor = CarSetting::where("_key", "=", "parking-sensor")->get();

        $car_type = CarSetting::where("_key", "=", "car-type")->get();

        $body_type = CarSetting::where("_key", "=", "body-type")->get();

        $interior = CarSetting::where("_key", "=", "interior")->get();

        $import = CarSetting::where("_key", "=", "import")->get();

        $service_history = CarSetting::where("_key", "=", "service-history")->get();

        $boot_spoiler = CarSetting::where("_key", "=", "boot-spoiler")->get();

        $modal = CarSetting::where("_key", "=", "modal")->get();

        $variant = CarSetting::where("_key", "=", "variant")->get();

        $car_make = CarSetting::where("_key", "=", "car-make")->get();

        $saftey_feature = CarSetting::where("_key", "=", "saftey-feature")->get();

        $ent_feature = CarSetting::where("_key", "=", "entertainment-feature")->get();

        $user = User::where('id', session('userDetails')->id)->first();

        $garage = GarageAdvert::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->paginate(9);

        $misc = Misecellinous::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->paginate(9);

        $wanted = Wanted::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->paginate(9);

        $user_car = User_car::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->with(["user", "engine_type", "color", "parking_sensor", "exhaust", "car_type", "body_type"])->paginate(8);


        // dd($packages);

        $swap_id = $id;

        return view('frontend.dashboard', compact('tab', 'user_packge_id', 'user_package', 'packages', 'user', 'engine_type', 'exhaust', 'colors', 'matt_paint', 'wheel_size', 'parking_sensor', 'car_type', 'body_type', 'user_car', 'interior', 'service_history', 'boot_spoiler', 'modal', 'variant', 'car_make', 'import', 'saftey_feature', 'update', 'ent_feature', 'garage', 'g_edit', 'wanted', 'w_edit', 'misc', 'misc_edit', 'swap_id'));

    }


    public function packagePurchase(Request $request)
    {
        $package_id = $request->package_id;
        $auth_id = session('userDetails')->id;
        $package_details = Package::find($package_id);
        $UserPackagePostLimit = UserPackagePostLimit::where('user_id',"=", $auth_id)->first();
        if ($package_details->role === "main") {
            $standardPackages = [
                Package::basic,
                Package::standard,
                Package::trader,
            ];
            $ch = UserPackage::where('user_id', $auth_id)->whereIn("package_id",$standardPackages)->first();
            if (!empty($ch)) {
                if ($ch->package_id <= $package_id) {
                    $userPackage = UserPackage::where("id","=", $ch->id)
                        ->update([
                            'package_id' => $package_id,
                                "status" => 1,
                                   "post_per_package"=>$package_details->post_per_package,
                                "free_post_per_package"=>$package_details->free_post_per_package,
                                "no_of_times" => $ch->no_of_times + 1,
                                     "wanted_adds"=>$ch->wanted_adds,
                                 "auction_adds"=>$ch->auction_adds,
                                 "swap_adds"=>$ch->swap_adds,
                                 "pres_adds"=>$ch->pres_adds,
                                 "misc_adds"=>$ch->misc_adds,
                                 "garage_adds"=>$ch->garage_adds,
                                 "amr_add"=>$ch->amr_add,
                                 "body_shop_adds"=>$ch->body_shop_adds,
                                 "rental_companie_adds"=>$ch->rental_companie_adds,
                            ]);

                    UserPackagePostLimit::where('user_id', "=",$auth_id)
                        ->update([
                            'package_id' => $package_id,
                            'user_package_id' => $ch->id,
                            'post_limit' => $package_details->post_per_package + (!empty($UserPackagePostLimit) ? $UserPackagePostLimit->post_limit : 0),
                        ]);

                } else {
                    return redirect()->route("package-dashboard", [ "error" => "You already have upgraded packge"]);
                }
            }
        } else {

            $ch = UserPackage::where('user_id' ,'=', $auth_id)->where("package_id","=",$package_id)->first();
            if (!empty($ch)) {
                $userPackage = UserPackage::where('package_id', "=", $package_id)
                    ->where("user_id", "=", $auth_id)
                    ->update([
                        "status" => 1,
                        "post_per_package"=>$package_details->post_per_package,
                        "free_post_per_package"=>$package_details->free_post_per_package,
                        "no_of_times" => $ch->no_of_times + 1,
                        "wanted_adds"=>$ch->wanted_adds,
                        "auction_adds"=>$ch->auction_adds,
                        "swap_adds"=>$ch->swap_adds,
                        "pres_adds"=>$ch->pres_adds,
                        "misc_adds"=>$ch->misc_adds,
                        "garage_adds"=>$ch->garage_adds,
                        "amr_add"=>$ch->amr_add,
                        "body_shop_adds"=>$ch->body_shop_adds,
                        "rental_companie_adds"=>$ch->rental_companie_adds,
                    ]);
            } else {

                $userPackage = UserPackage::create([
                    'user_id' => $auth_id,
                    'package_id' => $package_id,
                     "status" => $package_details->status,
                    "post_per_package"=>$package_details->post_per_package,
                    "free_post_per_package"=>$package_details->free_post_per_package,
                    "no_of_times" => 1,
                    "wanted_adds"=>$package_details->wanted_adds,
                    "auction_adds"=>$package_details->auction_adds,
                    "swap_adds"=>$package_details->swap_adds,
                    "pres_adds"=>$package_details->pres_adds,
                    "misc_adds"=>$package_details->misc_adds,
                    "garage_adds"=>$package_details->garage_adds,
                    "amr_add"=>$package_details->amr_add,
                    "class_add"=>$package_details->class_add,
                    "body_shop_adds"=>$package_details->body_shop_adds,
                    "rental_companie_adds"=>$package_details->rental_companie_adds,
                ]);
            }
            UserPackagePostLimit::where('user_id', "=",$auth_id)
                ->update([
                    'post_limit' => $package_details->post_per_package + (!empty($UserPackagePostLimit) ? $UserPackagePostLimit->post_limit : 0),
                ]);
        }
        return redirect()->route("package-dashboard");
    }


    public function userChangePassword()
    {
        return view("frontend.user-change-pass");
    }


    public function userChangePasswordSubmit(Request $request)

    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::where([['email', '=', $request->email]])->first();
        if ($user) {
            User::where('email', '=', $request->email)
                ->update([
                    'password' => Hash::make($request->password)
                ]);
            return redirect()
                ->back()
                ->with('success', trans('alert.record_updated'));

        } else {

            return redirect()
                ->back()
                ->with('error', trans('alert.record_unable_to_save'))
                ->withInput();

        }

    }


    public function userProfileUpdate(Request $request)

    {

        //  dd($request->lat,$request->lng);

        $validator = Validator::make($request->all(), [

            'email' => 'required',

            'first_name' => 'required',

            'last_name' => 'required',

            'phone' => 'required',

            'about' => 'required',

            'address' => 'required',

            'city' => 'required',

            'Country' => 'required',

            "PostalCode" => "required"

        ]);

        $data = $request->except('_token');

        if ($validator->fails()) {

            return redirect()
                ->route('profile-dashboard')
                ->withErrors($validator)
                ->withInput();

        }

        $data['avatar'] = $request->avatar;


        $userUpdate = User::where('id', '=', session('userDetails')->id)->update($data);


        if ($userUpdate) {

            $userData = User::find(session('userDetails')->id);

            session()->put("userDetails", $userData);

            session()->save();

            return redirect()
                ->route('profile-dashboard')
                ->with('success', trans('alert.record_updated'));

        } else {

            return redirect()
                ->route('profile-dashboard')
                ->with('error', trans('alert.record_unable_to_save'))
                ->withInput();

        }

    }

    public function user_save_car(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'registration_number' => 'required',

            'milage' => 'required',

            'engine_size' => 'required',

            'engine_type' => 'required',

            'color' => 'required',

            'interior' => 'required',

            'metallic_paint' => 'required',

            'matt_paint' => 'required',

            'warranty' => 'required',

            'driver_position' => 'required',

            'alloy_wheel' => 'required',

            'part_exchange' => 'required',

            'import' => 'required',

            'mot' => 'required',

            'service_history' => 'required',

            'boot_spoiler' => 'required',

            'parking_sensor' => 'required',

            'exhaust' => 'required',

            'modal' => 'required',

            'brand' => 'required',

            'car_type' => 'required',

            'year' => 'required',

            'post_code' => 'required',

            'transmission' => 'required',

            'fuel_type' => 'required',

            'condition' => 'required',

            'contact' => 'required',

            'advert_type' => 'required',

            'car_door' => 'required',

            'availibilty' => 'required',

            'pic' => 'required',

            'pic.*' => 'image|mimes:jpeg,png,jpg,gif,svg',


        ]);
        if ($validator->fails()){

            return response()->json(["status" => 0, "msg" => $validator->errors()->all()]);

        }

         $user_car = new User_car();

        $user_car->user_id = session('userDetails')->id;

        $user_car->registration_no = $request->registration_number;

        $user_car->mileage = $request->milage;

        $user_car->engine_size = $request->engine_size;

        $user_car->engine_type = $request->engine_type;

        $user_car->color = $request->color;

        $user_car->interior = $request->interior;

        $user_car->metallic_paint = $request->metallic_paint;

        $user_car->matt_paint = $request->matt_paint;

        $user_car->car_door = $request->car_door;

        $user_car->safety_rating = $request->saftey_rating;

        $user_car->safety_rating_info = $request->saftey_rating_info;

        $user_car->bhp = $request->bhp;

        $user_car->warranty = $request->warranty;

        $user_car->drivers_position = $request->driver_position;

        $user_car->wheel_size = $request->wheel_size;

        $user_car->alloy_wheel = $request->alloy_wheel;

        $user_car->part_exchange = $request->part_exchange;

        $user_car->speed = $request->speed;

        $user_car->contact_number = $request->contact;

        $user_car->tags = $request->tags;

        if ($request->open_time) {

            $user_car->open_timing = $request->open_time;

        }

        if ($request->close_time) {

            $user_car->close_timing = $request->close_time;

        }

        if ($request->auction_price) {

            $user_car->auction_discountprice = $request->auction_price;

        }

        if ($request->startdate_auction) {

            $user_car->auction_startdate = $request->startdate_auction;

        }

        if ($request->enddate_auction) {

            $user_car->auction_enddate = $request->enddate_auction;

        }

        if ($request->auctionmaplat) {

            $user_car->auction_maplat = $request->auctionmaplat;

        }

        if ($request->auctionmaplng) {

            $user_car->auction_maplng = $request->auctionmaplng;

        }

        if ($request->auction_location) {

            $user_car->auction_location = $request->auction_location;

        }

        if ($request->rent_duration) {

            $user_car->rent_duration = $request->rent_duration;

        }

        if ($request->rent_price) {

            $user_car->price = $request->rent_price;

        } else {

            $user_car->price = $request->price;

        }

        if ($request->open_day) {
            $user_car->open_day = $request->open_day;
        }

        if ($request->close_day) {
            $user_car->close_day = $request->close_day;
        }
        if ($request->feature_checkbox > 0) {

            // dd($request->feature_checkbox);

          $f_pkg = Packages::FeaturedPackageCount();
              if ($f_pkg === 'okay'){
                  $user_car->featured = $request->feature_checkbox;
              }
        }

        $user_car->top_speed = $request->top_speed;

        $user_car->driven_wheels = $request->driven_wheel;

        $user_car->import = $request->import;

        $user_car->mot_expiry_date = $request->mot;

        $user_car->service_history = $request->service_history;

        $user_car->boot_spoiler = $request->boot_spoiler;

        $user_car->parking_sensor = $request->parking_sensor;

        $user_car->exhaust = $request->exhaust;

        $user_car->modal = $request->modal;

        $user_car->brand = $request->brand;
if($request->variant){
        $user_car->variant = $request->variant;
}
        $user_car->car_type = $request->car_type;
 if ($request->published_form){
                $user_car->published = $request->published_form;
                }
        //$user_car->car_make = $request->car_make;

        $user_car->year = $request->year;

        $user_car->post_code = $request->post_code;

        //$user_car->body_type = $request->body_type;

        $user_car->transmission = $request->transmission;

        $user_car->fuel_type = $request->fuel_type;

        $user_car->car_condition = $request->condition;

        $user_car->advert_text = $request->advert_type;

        $user_car->crop_image = $request->img;


        $user_car->car_availbilty = $request->availibilty[0];


        $user_car->pic_url = $request->pic;

             if ($request->video_url) {

            if (stripos($request->video_url, 'watch' ) !== false){
                $url = $request->video_url;
                $parts = parse_url($url);
                parse_str($parts['query'], $query);
                $user_car->video_url = $query['v'];

            }else if(stripos($request->video_url, 'youtu.be') !== false ){
                $my_url = $request->video_url;
                $v_url = substr($my_url, strrpos($my_url, '/' )+1);
                $user_car->video_url = $v_url;
            }

        }

        // if ($request->has('video')) {

        // $user_car->video_url = $request->video;

        // }

        $se = array();

//        if ($request->saf_f){

//

//            $json1 = json_encode($request->saf_f);

//            $user_car->saftey_f = $json1;

//        }

        $ee = array();

        if ($request->en_f) {

            //$json2 = json_encode($request->en_f);

            $user_car->ent_f = '[' . $request->en_f . ']';

        }

        if ($request->saf_f){

            // $json1 = json_encode($request->saf_f);

            $user_car->saftey_f = '[' . $request->saf_f . ']';

        }
//        $package=UserPackage::with('u_package')->where("user_id",session('userDetails')->id)->get();
//if(!empty($package)){
//
//}
//        if($car_Avail === "Auction"){
//
//
//        }
        $car_pack_check = Packages::PackageAvail($request->availibilty[0]);
        if(!empty($car_pack_check)){
             $user_car->package_id = $car_pack_check;
            $status_pack = Packages::getUserPackageStatus($car_pack_check, session('userDetails')->id);
        }else{
            return response()->json(["status" => 0, "msg" => ["Purchase Package First."]]);
        }
        if($status_pack){
               $count_update =   Packages::CountStandardPackage($status_pack->id);
               if($count_update != null){
                     if ($user_car->save()) {


                $user = User::find(session('userDetails')->id);

                   $msg = "This User " . $user->username . "Create New Advertisment";

                   $folow = Followers::where('follow_first', session('userDetails')->id)->get();

                   foreach ($folow as $f) {

                       $follower_mail = User::where('id', $f->follow_second)->first();

                       $second_mail = User::where('id', $f->follow_first)->first();

                       if (!empty($follower_mail) && !empty($second_mail)) {

                           Mail::send("frontend.mail-follow", ["mail" => $second_mail, 'id' => $user_car->id], function ($message) use ($follower_mail) {

                               $message->to($follower_mail->email, $follower_mail->username)->subject("About Advertisement");

                           });

                       }

                   }

if ($request->published_form == 1){
    return response()->json(["status" => 1, "url" => route('my-advert'), "msg" => "record has been updated", "swap_route" => $request->swap]);
}else if ($request->published_form  == 0){
    return response()->json(["status" => 2, "url" => route('car-details',['id'=>base64_encode($user_car->id)]),"update"=>route('updatecar'),'id'=>$user_car->id]);
}

                  // return response()->json(["status" => 1, "url" => route('my-advert'), "msg" => "record has been updated", "swap_route" => $request->swap]);

               }

               }else{
                   return response()->json(["status" => 0, "msg" => ["Purchase Package First."]]);
               }




           }else {
               return response()->json(["status" => 0, "msg" => ["Purchase Package First."]]);
           }




        return response()->json(["status" => 0, "msg" => ["record not save...Please try again"]]);



    }


    public function user_update_car(Request $request)

    {



        $validator = Validator::make($request->all(), [

            'registration_number' => 'required',

            'milage' => 'required',

            'engine_size' => 'required',

            'engine_type' => 'required',

            'color' => 'required',

            'interior' => 'required',

            'metallic_paint' => 'required',

            'matt_paint' => 'required',

            'warranty' => 'required',

            'driver_position' => 'required',

            'alloy_wheel' => 'required',

            'part_exchange' => 'required',

            'import' => 'required',

            'mot' => 'required',

            'service_history' => 'required',

            'boot_spoiler' => 'required',

            'parking_sensor' => 'required',

            'exhaust' => 'required',

             'modal' => 'required',

            'brand' => 'required',

            'car_type' => 'required',

            'year' => 'required',

            'post_code' => 'required',

            'transmission' => 'required',

            'fuel_type' => 'required',

            'condition' => 'required',

            "car_door" => "required",

            'advert_type' => 'required',

            'contact' => 'required',

            'availibilty' => 'required',

            //  'user_car_pic'=>'required',


        ]);

        if ($validator->fails()) {

            return response()->json(["status" => 0, "msg" => $validator->errors()->all()]);

        }


//  $package=UserPackage::select("packages.*,")->join("packages","user_packages.package_id","=","packages.id")->where("user_packages.user_id",session('userDetails')->id)->where("user_packages.role","main")->where("status",1)->first();
//         if($package){
//           if($package->name==="Basic"){
//               $auc=1;
//               $swap=1;

//           }
//           else if($package->name==="Standard"){
//               $auc=3;
//               $swap=3;
//               $pre=3;
//           }
//           else{
//               $auc=9;
//               $swap=9;
//               $pre=9;
//           }
//         }
//         else{
//              return response()->json(["status" => 0, "msg" => ["Please Select any package "]]);
//         }
//         if(!empty($auc) && $request->car_availbilty[0]==="Auction"){
//             $ch=User_Car::where("user_id",session('userDetails')->id)->where("car_availbilty","Auction")->where("id","!=",$request->c_id)->count();
//             if($ch >=$auc){
//                 return response()->json(["status" => 0, "msg" => "Package Limit Exceed"]);
//             }
//         }
//         if(!empty($swap) && $request->car_availbilty[0]==="Swap"){
//             $ch=User_Car::where("user_id",session('userDetails')->id)->where("car_availbilty","Swap")->where("id","!=",$request->c_id)->count();
//             if($ch >=$swap){
//                 return response()->json(["status" => 0, "msg" => "Package Limit Exceed"]);
//             }
//         }
//         if(!empty($pre) && $request->car_availbilty[0]==="Prestige"){
//             $ch=User_Car::where("user_id",session('userDetails')->id)->where("car_availbilty","Prestige")->where("id","!=",$request->c_id)->count();
//             if($ch >=$auc){
//                 return response()->json(["status" => 0, "msg" => "Package Limit Exceed"]);
//             }
//         }


        $user_c = new User_car();

        $id = $request->c_id;


        $user_car = $user_c::find($id);

        if ($user_car) {

            $user_car->registration_no = $request->registration_number;

            $user_car->mileage = $request->milage;

            $user_car->engine_size = $request->engine_size;

            $user_car->engine_type = $request->engine_type;

            $user_car->color = $request->color;

            $user_car->car_door = $request->car_door;

            $user_car->interior = $request->interior;

            $user_car->metallic_paint = $request->metallic_paint;

            $user_car->matt_paint = $request->matt_paint;

            $user_car->safety_rating = $request->saftey_rating;

            $user_car->safety_rating_info = $request->saftey_rating_info;
            $user_car->crop_image = $request->img;
            $user_car->bhp = $request->bhp;

            $user_car->contact_number = $request->contact;

            $user_car->tags = $request->tags;

            if ($request->open_time) {

                $user_car->open_timing = $request->open_time;

            }

            if ($request->close_time) {

                $user_car->close_timing = $request->close_time;

            }

            // dd($request->feature_checkbox);

            if ($request->auction_price) {

                $user_car->auction_discountprice = $request->auction_price;

            }

            if ($request->startdate_auction) {

                $user_car->auction_startdate = $request->startdate_auction;

            }

            if ($request->enddate_auction) {

                $user_car->auction_enddate = $request->enddate_auction;

            }

            if ($request->auctionmaplat) {

                $user_car->auction_maplat = $request->auctionmaplat;

            }

            if ($request->auctionmaplng) {

                $user_car->auction_maplng = $request->auctionmaplng;

            }

            if ($request->auction_location) {

                $user_car->auction_location = $request->auction_location;

            }

            if ($request->rent_duration) {

                $user_car->rent_duration = $request->rent_duration;

            }

            if ($request->rent_price) {


                $user_car->price = $request->rent_price;

            } else {

                $user_car->price = $request->price;

            }

            if ($request->feature_checkbox > 0) {

                // dd($request->feature_checkbox);

                $user_car->featured = $request->feature_checkbox;

            }

            $user_car->warranty = $request->warranty;

            $user_car->drivers_position = $request->driver_position;

            $user_car->wheel_size = $request->wheel_size;

            $user_car->alloy_wheel = $request->alloy_wheel;

            $user_car->part_exchange = $request->part_exchange;

            $user_car->speed = $request->speed;

            $user_car->top_speed = $request->top_speed;

            $user_car->driven_wheels = $request->driven_wheel;

            $user_car->import = $request->import;

            $user_car->mot_expiry_date = $request->mot;

            $user_car->service_history = $request->service_history;

            $user_car->boot_spoiler = $request->boot_spoiler;

            $user_car->parking_sensor = $request->parking_sensor;

            $user_car->exhaust = $request->exhaust;
 if ($request->published_form){
                $user_car->published = $request->published_form;
                }


            $user_car->modal = $request->modal;

            $user_car->brand = $request->brand;
if($request->variant){
            $user_car->variant = $request->variant;
}
            $user_car->car_type = $request->car_type;

            //$user_car->car_make = $request->car_make;

            $user_car->year = $request->year;

            $user_car->post_code = $request->post_code;

//            $user_car->body_type = $request->body_type;

            $user_car->transmission = $request->transmission;

            $user_car->fuel_type = $request->fuel_type;

            $user_car->car_condition = $request->condition;
   $user_car->package_id = $request->package_id_update;
            $user_car->advert_text = $request->advert_type;

            $user_car->car_availbilty = $request->availibilty[0];

            $user_car->pic_url = $request->pic;

                if ($request->video_url) {
                if (stripos($request->video_url, 'watch' ) !== false){
                    $url = $request->video_url;
                    $parts = parse_url($url);
                    parse_str($parts['query'], $query);
                    $user_car->video_url = $query['v'];

                }else if(stripos($request->video_url, 'youtu.be') !== false ){
                    $my_url = $request->video_url;
                    $v_url = substr($my_url, strrpos($my_url, '/' )+1);
                    $user_car->video_url = $v_url;
                }else{
                    $user_car->video_url = $request->video_url;
                }


            }

            if ($request->open_day) {
                $user_car->open_day = $request->open_day;
            }

            if ($request->close_day) {
                $user_car->close_day = $request->close_day;
            }

            // $user_car->video_url = $request->video_url;

            $se = array();

            if ($request->en_f) {

                //$json2 = json_encode($request->en_f);

                $user_car->ent_f = '[' . $request->en_f . ']';

            }


            if ($request->saf_f) {

                // $json1 = json_encode($request->saf_f);

                $user_car->saftey_f = '[' . $request->saf_f . ']';

            }

            if ($user_car->save()) {
                if ($request->published_form_update == 3){

    return response()->json(["status" => 2, "url" => route('car-details',['id'=>base64_encode($user_car->id)]),"update"=>route('updatecar'),'id'=>$user_car->id]);
}else{

    if ($user_car->published == 0){

        return response()->json(["status" => 2, "url" => route('car-details',['id'=>base64_encode($user_car->id)]),"update"=>route('updatecar'),'id'=>$user_car->id]);

    }else{
        return response()->json(["status" => 1, "url" => route('my-advert'), "msg" => "record has been updated", "swap_route" => $request->swap]);
    }
}

                // return response()->json(["status" => 1, "url" => route('my-advert'), "msg" => "record has been updated"]);


            }

        }


        return response()->json(["status" => 0, "msg" => ["record not save...Please try again"]]);

    }


    public function add_garage_advert(Request $request)

    {


        $validator = Validator::make($request->all(), [

            'c_name' => 'required',

            'description' => 'required',

            'compan_email' => 'required',

            'opening_timing' => 'required',

            'close_timing' => 'required',

            'image' => 'required',

            'category'=> 'required',

        ]);

        if ($validator->fails()) {

            return response()->json(["status" => 0, "msg" => $validator->errors()->all()]);

        }


        if ($request->id == 0) {
  $car_pack_check = Packages::PackageAvail("garage");
            if(!empty($car_pack_check)){
                $status_pack = Packages::getUserPackageStatus($car_pack_check, session('userDetails')->id);
            }else{
                return response()->json(["status" => 0, "msg" => ["Purchase Package First."]]);
            }
            if($status_pack){
                $count_update = Packages::CountStandardPackage($status_pack->id);
                if ($count_update != null) {

                }else{
                    return response()->json(["status" => 0, "msg" => ["Purchase Package First."]]);
                }
            }else{
                return response()->json(["status" => 0, "msg" => ["Purchase Package First."]]);
            }
            $garage = new GarageAdvert();

        } else {

            $g = new GarageAdvert();

            $garage = $g::find($request->id);


        }

        $garage->c_name = $request->c_name;
        $garage->contact_number = $request->g_contact;
        $garage->user_id = session('userDetails')->id;

        $garage->description = $request->description;

        $garage->deal_item = $request->deal_item;

        $garage->compan_mail = $request->compan_email;

        $garage->user_website = $request->url;
  $garage->category = $request->category[0];
        $garage->pic = $request->image;

        $garage->open_timing = $request->opening_timing;

        $garage->close_timing = $request->close_timing;

        $garage->tags = $request->tags;

       $garage->feature_img = $request->img;

        if ($garage->save()) {

            return response()->json(["status" => 1, "msg" => "record has been inserted"]);

        } else {

            return response()->json(["status" => 0, "msg" => "Please Try Again"]);

        }

    }

    public function add_wanted_advert(Request $request)

    {


        //dd($request->all());


        if ($request->id != 0) {

            $validator = Validator::make($request->all(), [

                'title' => 'required',

                'describe' => 'required',

                'brand' => 'required',

                'model' => 'required',

                'varient' => 'required',

                'budget' => 'required',

                'w_image' => 'required'

            ]);

        } else {

            $validator = Validator::make($request->all(), [

                'title' => 'required',

                'describe' => 'required',

                'w_image' => 'required',

                'brand' => 'required',

                'model' => 'required',

                'varient' => 'required',

                'budget' => 'required',

            ]);

        }

        if ($validator->fails()) {

            return response()->json(["status" => 0, "msg" => $validator->errors()->all()]);

        }

        if ($request->id == 0) {

  $car_pack_check = Packages::PackageAvail("wanted");
            if(!empty($car_pack_check)){

                $status_pack = Packages::getUserPackageStatus($car_pack_check, session('userDetails')->id);
                }else{
                return response()->json(["status" => 0, "msg" => ["Purchase Package First."]]);
            }
            if($status_pack){
                $count_update = Packages::CountStandardPackage($status_pack->id);
                if ($count_update != null) {

                }else{
                    return response()->json(["status" => 0, "msg" => ["Purchase Package First."]]);
                }
            }else{
                return response()->json(["status" => 0, "msg" => ["Purchase Package First."]]);
            }
            $garage = new Wanted();


        } else {

            $g = new Wanted();

            $garage = $g::find($request->id);
            $package = UserPackage::select("packages.*,")->join("packages", "user_packages.package_id", "=", "packages.id")->where("user_packages.user_id", session('userDetails')->id)->where("user_packages.role", "main")->where("status", 1)->first();
            if ($package) {
                if ($package->name === "Basic") {
                    $w = 1;


                } else if ($package->name === "Standard") {

                    $w = 3;

                } else {
                    $w = 9;

                }
            } else {
                return response()->json(["status" => 0, "msg" => ["Please Select any package "]]);
            }
            if (!empty($w)) {
                $ch = Wanted::where("user_id", session('userDetails')->id)->where("id", "!=", $request->id)->count();
                if ($ch >= $w) {
                    return response()->json(["status" => 0, "msg" => "Package Limit Exceed"]);
                }
            }


        }

        $garage->title = $request->title;

        $garage->user_id = session('userDetails')->id;

        $garage->describe = $request->describe;

        $garage->brand = $request->brand;

        $garage->model = $request->model;

        $garage->budget = $request->budget;

        $garage->varient = $request->varient;

        $garage->tags = $request->tags;

        $garage->user_number = $request->user_numb;

        if ($request->has("w_image")) {

            $garage->image = $request->w_image;

        }

        if ($garage->save()) {

            return response()->json(["status" => 1, "msg" => "record has been inserted"]);

        } else {

            return response()->json(["status" => 0, "msg" => "Please Try Again"]);

        }


    }

    public function del_car($id)

    {

        $id = base64_decode($id);

        $res = User_car::find($id);

        if ($res) {

            if ($res->delete()) {

                return response()->json(["status" => 1, "msg" => "Car add has been deleted"]);

            } else {

                return response()->json(["status" => 0, "msg" => "Please Refresh and try again"]);

            }

        }

    }

    public function del_garage($id)

    {

        $id = base64_decode($id);

        $garage = new GarageAdvert();

        $garage = $garage::find($id);

        if ($garage) {

            if ($garage->delete()) {

                return response()->json(["status" => 1, "msg" => "Georage add has been deleted"]);

            } else {

                return response()->json(["status" => 0, "msg" => "Please Refresh and try again"]);

            }

        }

    }

    public function del_wanted($id)

    {

        $id = base64_decode($id);

        $want = new Wanted();

        $want = $want::find($id);

        if ($want) {

            if ($want->delete()) {

                return response()->json(["status" => 1, "msg" => "Georage add has been deleted"]);

            } else {

                return response()->json(["status" => 0, "msg" => "Please Refresh and try again"]);

            }

        }

    }

    public function del_misc($id)

    {

        $id = base64_decode($id);

        $res = Misecellinous::find($id);

        if ($res) {

            if ($res->delete()) {

                return response()->json(["status" => 1, "msg" => "Car add has been deleted"]);

            } else {

                return response()->json(["status" => 0, "msg" => "Please Refresh and try again"]);

            }

        }

    }


    public function miscellanousCreate(Request $request)
    {

        if ($request->id != 0) {

            $validator = Validator::make($request->all(), [

                'brand' => 'required',

                'car_part' => 'required',

                'price' => 'required',

                'part_condition' => 'required',

                'model' => 'required'

            ]);

        } else {

            $validator = Validator::make($request->all(), [

                'brand' => 'required',

                'car_part' => 'required',

                'price' => 'required',

                'image' => 'required',

                "part_condition" => "required",

                'model' => 'required'

            ]);

        }


        if ($validator->fails()) {

            return response()->json(["status" => 0, "msg" => $validator->errors()->all()]);

        }


        if ($request->id == 0) {

                  $car_pack_check = Packages::PackageAvail("misc");
            if(!empty($car_pack_check)){
                $status_pack = Packages::getUserPackageStatus($car_pack_check, session('userDetails')->id);
            }else{
                return response()->json(["status" => 0, "msg" => ["Purchase Package First."]]);
            }
            if($status_pack){
                $count_update = Packages::CountStandardPackage($status_pack->id);
                if ($count_update != null) {

                }else{
                    return response()->json(["status" => 0, "msg" => ["Purchase Package First."]]);
                }
            }else{
                return response()->json(["status" => 0, "msg" => ["Purchase Package First."]]);
            }

            $misc = new Misecellinous();

        } else {

            $m = new Misecellinous();

            $misc = $m::find($request->id);


        }

        $misc->model = $request->model;

        $misc->brand = $request->brand;

        $misc->user_id = session('userDetails')->id;

        $misc->car_part = $request->car_part;

        $misc->price = $request->price;

        $misc->number = $request->misc_numb;

        $misc->part_condition = $request->part_condition;

  $misc->tags = $request->tags;

        if ($request->has('img')) {

            $crop_image = $request->img;

            $explode1 = explode(";", $crop_image);

            $explode2 = explode(",", $explode1[1]);

            $data = base64_decode($explode2[1]);

            $img_name = time() . ".png";

            $upload_path = public_path('crop_images/' . $img_name);

            file_put_contents($upload_path, $data);

            $misc->feature_img = $img_name;

        }

       $misc->pics = $request->image;

        if ($misc->save()) {

            return response()->json(["status" => 1, "msg" => "record has been inserted"]);

        } else {

            return response()->json(["status" => 0, "msg" => "Please Try Again"]);

        }


    }


    public function swapCreate(Request $request)

    {


        $validator = validator::make($request->all(), [

            'manufacture' => 'required',

            'car_type' => 'required',

            'carmake' => 'required',

            'enginetype' => 'required',

            'color' => 'required',

            'swap_condition' => 'required',

            'mileage' => 'required',

            'registration_no' => 'required',

            'image' => 'required',

            'fuel_type' => 'required',

            'price' => 'required'

        ]);

        if ($validator->fails()) {


            return response()->json(["status" => 0, "msg" => $validator->errors()->all()]);

        }


        if (session("userLoggedIn") == true) {


            if ($request->swap_id == 0) {


                $swap = new Swap();

            } else {


                $swap = new Swap();

                $swap = $swap::find($request->swap_id);

            }


            $swap->registration_number = $request->registration_no;

            $swap->mileage = $request->mileage;

            $swap->manufacture = $request->manufacture;

            $swap->user_id = session('userDetails')->id;

            $swap->car_type = $request->car_type;

            $swap->car_make = $request->carmake;

            $swap->engine_type = $request->enginetype;

            $swap->car_condition = $request->swap_condition;

            $swap->model = $request->model;

            $swap->color = $request->color;

            $swap->price = $request->price;

            $swap->fuel_type = $request->fuel_type;


            $img = array();

            if ($request->hasFile('image')) {

                foreach ($request->file('image') as $file) {

                    $img[] = $file->store('garage_advert', 'public');

                }

                $json = json_encode($img);

                $swap->pic = $json;

                $crop_image = $request->img;

                $explode1 = explode(";", $crop_image);

                $explode2 = explode(",", $explode1[1]);

                $data = base64_decode($explode2[1]);

                $img_name = time() . ".png";

                $upload_path = public_path('crop_images/' . $img_name);

                file_put_contents($upload_path, $data);

                $swap->featured_img = $img_name;

            }

            if ($swap->save()) {

                $result = $swap::where('id', '=', $swap->id)->first();

                return response()->json(["status" => 1, "msg" => "record has been inserted", "result" => $result]);

            } else {

                return response()->json(["status" => 0, "msg" => "Please Try Again"]);

            }


        }

        //else {

//            $value = $request->all();

//            $crop_image = $request->img;

//           // dd($request->all());

//            $explode1 = explode(";", $crop_image);

//            $explode2 = explode(",", $explode1[1]);

//            $data = base64_decode($explode2[1]);

//            $value["img"]=$data;

//         $request->session()->put("swap_car",$value);

////            $swap_session=  $request->session()->get("swap_car");

//            return response()->json(["status" => 2, "msg" => "Please login"]);


        //   }


    }


    public function CarDetail($id)

    {

        $id = base64_decode($id);

        $comments = [];
            //CarComment::with('user')->where('car_id', '=', $id)->get();

        $review = [];
            //CarRating::where('car_id', $id)->get();

        $review = count($review);

        $rating = [];
            //CarRating::OrderBy('rating', 'desc')->where('car_id', $id)->first();

        $detail = User_car::with('ent', 'user', 'enginetype', 'd_model', 'variant_rel', 'd_brand', 'cartype', 'entertainment_feature')->where('id', '=', $id)->first();

        //  $morecar = User_car::orderBy('created_at', 'desc')->where('id','!=',$detail->id)->where('car_availbilty','=',$detail->car_availbilty)->get();

        $bid = [];
            // AuctionBid::orderBy('bid_amount', 'desc')->where('car_id', '=', $id)->first();

        $c_bid =[];
          //  AuctionBid::Where('car_id', '=', $id)->get();
          // dd($detail->AvailabilitySafety);

        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true) {

            $carrate = [];
                //CarRating::OrderBy('rating', 'desc')->where('user_id', session('userDetails')->id)->where('car_id', $id)->first();

            $like = [];
                //LikeCarDetail::where('car_id', '=', $detail->id)->where('user_id', '=', session('userDetails')->id)->first();

            $morecar = User_car::orderBy('created_at', 'desc')->where('id', '!=', $detail->id)->where('car_availbilty', '=', $detail->car_availbilty)->where("user_id", "!=", session('userDetails')->id)->get();

            $type = "other";
            if ($detail->car_availbilty === "Auction") {


                return view('frontend.car-selling-auction', compact('detail', 'morecar', 'comments', 'like', 'bid', 'c_bid', 'carrate', 'review', 'rating', 'type'));
            }


            return view('frontend.car-selling', compact('detail', 'morecar', 'comments', 'like', 'carrate', 'review', 'rating', 'type'));


        } else {


            $morecar = User_car::orderBy('created_at', 'desc')->where('id', '!=', $detail->id)->where('car_availbilty', '=', $detail->car_availbilty)->get();


        }


        if ($detail->car_availbilty === "Auction") {


            return view('frontend.car-selling-auction', compact('detail', 'morecar', 'comments', 'bid', 'c_bid', 'review', 'rating'));


        }

        return view('frontend.car-selling', compact('detail', 'morecar', 'comments', 'review', 'rating'));


    }


    public function CarComment(Request $request)
    {

        $request->validate([

            'car_id' => 'required',

            'comment' => ['required', 'string', 'min:1', 'max:255'],

            'car_availbilty' => 'required',


        ]);

        $comment = new CarComment();

        $comment->car_id = $request->car_id;

        $comment->user_id = session('userDetails')->id;

        $comment->comment = $request->comment;

        $comment->car_availbilty = $request->car_availbilty;


        if ($comment->save()) {

            return redirect()->route('car-details', ['id' => base64_encode($request->car_id)]);

        }


        return redirect()->back()->with('failure', 'Comment not Post!');


    }


    public function LikeCarDetail($c_id)
    {

        $save = new likeCarDetail();

        $id = session('userDetails')->id;

        if ($car = likeCarDetail::where("user_id", "=", $id)->where("car_id", "=", $c_id)->first()) {

            if ($car->delete()) {

                return response()->json(["status" => 1, "result" => "Car deleted"]);

            }

        }

        $save->user_id = $id;

        $save->car_id = $c_id;

        if ($save->save()) {

            return response()->json(["status" => 1, "result" => "okay"]);

        }

        return response()->json(["status" => 0, "result" => ""]);


    }

    public function ReportCar(Request $request)
    {

        $r = ReportCar::where('car_id', $request->car_id)->where('user_id', session('userDetails')->id)->first();

        $save = new ReportCar();

        $save->user_id = session('userDetails')->id;

        $save->car_id = $request->car_id;

        $save->reason = $request->reason;

        if (empty($r)) {

            if ($save->save()) {

                return response()->json(["status" => 1, "result" => "Your reason was submited"]);

            }

        } else {

            return response()->json(["status" => 0, "result" => "you have already reported this ad"]);

        }


        return response()->json(["status" => 0, "result" => "Not Submit"]);


    }

    public function CreateBid(Request $request)

    {

        $check = AuctionBid::orderBy('bid_amount', 'desc')->where('car_id', '=', $request->car_id)->first();

        $bid = new AuctionBid();

        $bid->user_id = session('userDetails')->id;

        $bid->car_id = $request->car_id;

        $bid->bid_amount = $request->bid_amount;

        if ($bid->save()) {

            $c_bid = AuctionBid::where('car_id', '=', $bid->car_id)->get();

            $count = count($c_bid);

            $bid_amount = (int)$bid->bid_amount;

            // dd($bid_amount,$check->bid_amount,$bid_amount > $check->bid_amount);

            //dd($check);

            if ($check == null) {

                $check = AuctionBid::orderBy('bid_amount', 'desc')->where('car_id', '=', $request->car_id)->first();

                // dd($result);

                return response()->json(['status' => 1, 'result' => $check->bid_amount, 'count' => $count]);

            }

            if ($bid_amount > $check->bid_amount) {

                $result = $bid->bid_amount;

                // dd($result);

                return response()->json(['status' => 1, 'result' => $result, 'count' => $count]);

            }

            //  $result = AuctionBid::where('bid_amount','>',$bid->bid_amount)->first();


            return response()->json(['status' => 1, 'result' => null, 'count' => $count]);

        }


        return response()->json();

    }

    public function MyAdvert()
    {
        $user_car = User_car::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->with(["user", "engine_type", "color", "parking_sensor", "exhaust", "car_type", "body_type"])->paginate(8);
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "my_advert";
        return view('frontend.dashboard', compact('user_car', 'update', 'w_edit', 'g_edit', 'misc_edit', 'tab'));

    }

    public function SellYourCar($id = null)
    {
        if ($id != null) {
            $id = base64_decode(base64_decode($id));
            $update = User_car::find($id);
        } else {
            $update = null;
        }
        $engine_type = CarSetting::where("_key", "=", "engine-types")->get();

        $exhaust = CarSetting::where("_key", "=", "exhaust")->get();

        $colors = CarSetting::where("_key", "=", "colors")->get();

        $matt_paint = CarSetting::where("_key", "=", "matt-paint")->get();

        $wheel_size = CarSetting::where("_key", "=", "wheel-size")->get();

        $parking_sensor = CarSetting::where("_key", "=", "parking-sensor")->get();

        $car_type = CarSetting::where("_key", "=", "car-type")->get();

        $body_type = CarSetting::where("_key", "=", "body-type")->get();

        $interior = CarSetting::where("_key", "=", "interior")->get();

        $import = CarSetting::where("_key", "=", "import")->get();

        $service_history = CarSetting::where("_key", "=", "service-history")->get();

        $boot_spoiler = CarSetting::where("_key", "=", "boot-spoiler")->get();

        $modal = CarSetting::where("_key", "=", "modal")->get();

        $variant = CarSetting::where("_key", "=", "variant")->get();

        $car_make = CarSetting::where("_key", "=", "car-make")->get();

        $saftey_feature = CarSetting::where("_key", "=", "saftey-feature")->get();

        $ent_feature = CarSetting::where("_key", "=", "entertainment-feature")->get();
        $user_packge_id = null;
        $user_package = UserPackage::where('user_id', '=', session('userDetails')->id)->with("package")->first();
        if ($user_package) {
            $user_packge_id = $user_package->package_id;
        }else{
            $package = UserPackage::create([
                'user_id' => session('userDetails')->id,

                'package_id' => 2
            ]);
        }
        $packages = Package::all();
        $user = User::where('id', session('userDetails')->id)->first();


        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "sell_your_car";
        return view('frontend.dashboard', compact('update', 'w_edit', 'g_edit', 'misc_edit', 'tab', 'user', 'engine_type', 'exhaust', 'colors', 'matt_paint', 'wheel_size', 'parking_sensor', 'car_type', 'body_type', 'interior', 'service_history', 'boot_spoiler', 'modal', 'variant', 'car_make', 'import', 'saftey_feature', 'update', 'ent_feature', 'user', 'user_packge_id', 'user_package', 'packages'));
    }

    public  function  MyPayments (){

    $engine_type = CarSetting::where("_key", "=", "engine-types")->get();

    $exhaust = CarSetting::where("_key", "=", "exhaust")->get();

    $colors = CarSetting::where("_key", "=", "colors")->get();

    $matt_paint = CarSetting::where("_key", "=", "matt-paint")->get();

    $wheel_size = CarSetting::where("_key", "=", "wheel-size")->get();

    $parking_sensor = CarSetting::where("_key", "=", "parking-sensor")->get();

    $car_type = CarSetting::where("_key", "=", "car-type")->get();

    $body_type = CarSetting::where("_key", "=", "body-type")->get();

    $interior = CarSetting::where("_key", "=", "interior")->get();

    $import = CarSetting::where("_key", "=", "import")->get();

    $service_history = CarSetting::where("_key", "=", "service-history")->get();

    $boot_spoiler = CarSetting::where("_key", "=", "boot-spoiler")->get();

    $modal = CarSetting::where("_key", "=", "modal")->get();

    $variant = CarSetting::where("_key", "=", "variant")->get();

    $car_make = CarSetting::where("_key", "=", "car-make")->get();

    $saftey_feature = CarSetting::where("_key", "=", "saftey-feature")->get();

    $ent_feature = CarSetting::where("_key", "=", "entertainment-feature")->get();
    $user_packge_id = null;
    $user_package = UserPackage::where('user_id', '=', session('userDetails')->id)->with("package")->first();
    if ($user_package) {
        $user_packge_id = $user_package->package_id;
    }
    $pkg = false ;


    $packages = Package::all();
    $user = User::where('id', session('userDetails')->id)->first();
    $payment_pkg = UserPayment::where('user_id',session('userDetails')->id)->paginate(8);

    $w_edit = null;
    $g_edit = null;
    $misc_edit = null;
    $tab = "my_payments";
    return view('frontend.dashboard', compact('pkg', 'payment_pkg','w_edit', 'g_edit', 'misc_edit', 'tab', 'user', 'engine_type', 'exhaust', 'colors', 'matt_paint', 'wheel_size', 'parking_sensor', 'car_type', 'body_type', 'interior', 'service_history', 'boot_spoiler', 'modal', 'variant', 'car_make', 'import', 'saftey_feature', 'ent_feature', 'user', 'user_packge_id', 'user_package', 'packages'));
}

    public function ProfileDashboard()
    {
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "profile_dash";
        $user = User::where('id', session('userDetails')->id)->first();
        return view('frontend.dashboard', compact('user', 'update', 'w_edit', 'g_edit', 'misc_edit', 'tab'));
    }

    public function PackagesDashboard(Request $request)
    {

         if (isset($request->paymentId)  && isset($request->PayerID)){

          PayPal::executePayment($request->paymentId,$request->PayerID);

       $usr_id =UserPayment::where('pay_id',$request->paymentId)->first();
       if($usr_id){
              $follower_mail = User::where('id', $usr_id->user_id)->first();

                        $second_mail = 'info@powerperformancecars.co.uk';

                        if (!empty($follower_mail) && !empty($second_mail)) {

                            Mail::send("frontend.payment-mail", ["mail" => $second_mail], function ($message) use ($follower_mail) {

                                $message->to($follower_mail->email, $follower_mail->username)->subject("About Advertisement");

                            });

                        }
       }


         }
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $user_packge_id = Package::basic;
        $user_package = UserPackage::where('user_id', '=', session('userDetails')->id)->with("package")->first();
        if (!empty($user_package)) {
            $user_packge_id = $user_package->package_id;
        } else {
            $package = UserPackage::create([
                'user_id' => session('userDetails')->id,
                'package_id' => $user_packge_id
            ]);
            $ch = Package::find($user_packge_id);
            UserPackagePostLimit::create([
                'user_id' => session('userDetails')->id,
                'package_id' => $user_packge_id,
                'user_package_id' => $package->id,
                'post_limit' => $ch->post_per_package,
            ]);
        }
        $packages = Package::where("id","<>",Package::Feature)->get();
        $user = User::where('id', session('userDetails')->id)->first();
        $tab = "packages_dash";
        return view('frontend.dashboard', compact('user', 'update', 'w_edit', 'g_edit', 'misc_edit', 'tab', 'user_packge_id', 'user_package', 'packages', 'user'));
    }

    public function ChangePackage()
    {
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "change_package";
        $user_packge_id = null;
        $user_package = UserPackage::where('user_id', '=', session('userDetails')->id)->with("package")->first();
        if ($user_package) {
            $user_packge_id = $user_package->package_id;
        } else {
            $package = UserPackage::create([
                'user_id' => session('userDetails')->id,
                'package_id' => 2
            ]);
        }
        $packages = Package::where("id","<>",Package::Feature)->get();
        $user = User::where('id', session('userDetails')->id)->first();
        return view('frontend.dashboard', compact('update', 'w_edit', 'g_edit', 'misc_edit', 'tab', 'user_packge_id', 'user_package', 'packages', 'user'));
    }

    public function CreateWantedSection($id = null)
    {
        if ($id != null) {
            $id = base64_decode($id);
            $w_edit = Wanted::find($id);

        } else {
            $w_edit = null;
        }
        $update = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "wanted_sections_tab";
        return view('frontend.dashboard', compact('update', 'w_edit', 'g_edit', 'misc_edit', 'tab'));
    }

    public function WantedList()
    {
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "wanted_list";
        $wanted = Wanted::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->paginate(9);
        return view('frontend.dashboard', compact('update', 'w_edit', 'g_edit', 'misc_edit', 'tab', 'wanted'));
    }

    public function CreateGarage($id = null)
    {
        if ($id != null) {
            $id = base64_decode($id);
            $g_edit = GarageAdvert::find($id);

        } else {
            $g_edit = null;
        }
        $update = null;
        $w_edit = null;
        $misc_edit = null;
        $tab = "garage_advert";
        $user_packge_id = null;
        $user_package = UserPackage::where('user_id', '=', session('userDetails')->id)->with("package")->first();
        if ($user_package) {
            $user_packge_id = $user_package->package_id;
        } else {
            $package = UserPackage::create([
                'user_id' => session('userDetails')->id,

                'package_id' => 2
            ]);
        }
        $packages = Package::all();
        $user = User::where('id', session('userDetails')->id)->first();
        return view('frontend.dashboard', compact('update', 'w_edit', 'g_edit', 'misc_edit', 'tab', 'user', 'user_packge_id', 'user_package', 'packages'));
    }

    public function GarageList()
    {
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "garage";
        $garage = GarageAdvert::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->paginate(9);
        return view('frontend.dashboard', compact('update', 'w_edit', 'g_edit', 'misc_edit', 'tab', 'garage'));
    }

    public function CreateMics($id = null)
    {
        if ($id != null) {
            $id = base64_decode($id);
            $misc_edit = Misecellinous::find($id);

        } else {
            $misc_edit = null;
        }
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $tab = "misslenious_create";
        $user_packge_id = null;
        $user_package = UserPackage::where('user_id', '=', session('userDetails')->id)->with("package")->first();
        if ($user_package) {
            $user_packge_id = $user_package->package_id;
        } else {
            $package = UserPackage::create([
                'user_id' => session('userDetails')->id,

                'package_id' => 2
            ]);
        }
        $packages = Package::all();
        $user = User::where('id', session('userDetails')->id)->first();
        return view('frontend.dashboard', compact('update', 'w_edit', 'g_edit', 'misc_edit', 'tab', 'user', 'user_packge_id', 'user_package', 'packages'));
    }

    public function Miscallanous()
    {
        $update = null;
        $w_edit = null;
        $g_edit = null;
        $misc_edit = null;
        $tab = "misslenious_add_tab";
        $misc = Misecellinous::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->paginate(9);
        return view('frontend.dashboard', compact('update', 'w_edit', 'g_edit', 'misc_edit', 'tab', 'misc'));
    }

    public function StarRating($id, $c_id)

    {

        $reating = new CarRating();

        $reating->user_id = session('userDetails')->id;

        $reating->car_id = $c_id;

        $reating->rating = $id;

        if ($reating->save()) {

            return response()->json(['status' => 1, 'result' => 'Rating Inserted']);

        }

        return response()->json(['status' => 1, 'result' => 'Something Was Wrong']);


    }


    public function CategoryDataDisplay($type)
    {

        if ($type == "wanted") {

            $result = Wanted::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->get();

            return response()->json(['status' => 1, 'result' => $result]);

        } elseif ($type == "miscellaneous") {

            $result = Misecellinous::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->get();

            return response()->json(['status' => 2, 'result' => $result]);

        } elseif ($type == "garage") {

            $result = GarageAdvert::OrderBy('created_at', 'desc')->where('user_id', session('userDetails')->id)->get();

            return response()->json(['status' => 3, 'result' => $result]);

        } else {

            return response()->json(['status' => 0, 'msg' => "Something was wrong"]);

        }


    }


}

