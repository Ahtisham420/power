<?php

namespace App\Http\Controllers;

use App\Followers;
use App\ContactUs;
use Illuminate\Http\Request;


class FollowerController extends Controller
{
    public  function  create(Request $request){
         $stid = base64_decode($request->follower_1st);
        $folow = Followers::where("follow_first",$stid)->where("follow_second",session('userDetails')->id)->first();
        if (!empty($folow) &&  $folow->delete()){
            return response()->json(['status'=>3,'result' => 'Un Followed']);
        }else{
            $folow = new Followers();
            $folow->follow_first =$stid;
            $folow->follow_second = session('userDetails')->id;
            if ($folow->save()){
                return response()->json(['status'=>1,'result' => 'Followed']);
            }else{
                return response()->json(['status'=>0,'result' => 'Not Followed']);
            }
        }




    }





    public  function  ContactUs(Request $request){
$result = new ContactUs();
$result->name = $request->name;
$result->email = $request->email;
$result->message =$request->massage;
if ($result->save()){
    return redirect()->route('frontend-home');
}
    }


}
