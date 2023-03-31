<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Misecellinous;
use Illuminate\Support\Facades\Validator;
class MisecellinousController extends Controller
{
public  function  filterMisc($query,$search=null){
    if ($search == null){
        $result = Misecellinous::with("brand_misc","model_misc")->whereraw($query)->get();
    }else{
        $result = Misecellinous::with("brand_misc","model_misc")->whereraw($query)->where("car_part","like","%".$search."%")->get();
    }


    if (!empty($result) && count($result) != 0) {
        return response()->json(["status" => 1, "result" => $result]);
    }
    return response()->json(["status" => 0, "result" => ""]);
}


     public  function  SearchMisc($val){
                    $result = Misecellinous::with("brand_misc","model_misc")->where("car_part",'like', '%'.$val.'%')->get();
         if (!empty($result) && count($result) != 0) {
             return response()->json(["status" => 1, "result" => $result]);
         }
         return response()->json(["status" => 0, "result" => ""]);
                }

                public function SearchPriceMisc($val1,$val2,$search=null)
                {
                    if ($search == null){
                        $result = Misecellinous::with("brand_misc","model_misc")->whereBetween("price", [$val1,$val2])->get();
                    }else{
                        $result = Misecellinous::with("brand_misc","model_misc")->whereBetween("price", [$val1,$val2])->where("car_part",'like', '%'.$search.'%')->get();
                    }

                    if (!empty($result) && count($result) != 0) {
                        return response()->json(["status" => 1, "result" => $result]);
                    }
                    return response()->json(["status" => 0, "result" => ""]);


                }

}
