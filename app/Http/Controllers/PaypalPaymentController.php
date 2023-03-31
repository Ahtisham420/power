<?php

namespace App\Http\Controllers;

use App\Classes\PayPal;
use Illuminate\Http\Request;
use App\UserPackage;
use App\Package;
use Illuminate\Support\Facades\Redirect;

class PaypalPaymentController extends Controller
{
    //
    public function index(Request $request){
        $paypal = new PayPal();
            $price =floatval($request->price);
        $package_id = intval($request->packege_id);
         if ($package_id === 15){
            $c_user_p = UserPackage::where('package_id',$package_id)->where('user_id',session('userDetails')->id)->where('paid_status',0)->where('featured','>',0)->first();
            if (!isset($c_user_p)){
                $basic_package = Package::find($package_id);
                UserPackage::create([
                    'user_id' => session('userDetails')->id,
                    'package_id' => $package_id,
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
            }

        }
     
        if($paypal->create(session('userDetails')->id,$package_id,$price)){
            return Redirect::to($paypal->approval_url);
        }else
            echo "failed";
    }

    public function executePayment(Request $request){
        //PayerID need to fetch from query param on return url
        return PayPal::executePayment($request->paymentId,$request->PayerID);
    }
}
