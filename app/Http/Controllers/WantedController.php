<?php

namespace App\Http\Controllers;

use App\User_car;
use App\UserPackage;
use App\WantedChat;
use Illuminate\Http\Request;
use App\Wanted;
use App\Brand;
use  App\SaveList;
use  App\Chat;
use  App\Messenger;
use Illuminate\Support\Facades\View;

class WantedController extends Controller
{
    public function index()
    {
        $table = Wanted::with('brandWanted', 'modelWanted', 'varientWanted')->orderBy('created_at', 'desc')->paginate(6);
        $user_s = array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = SaveList::where("user_id", "=", session('userDetails')->id)->get();
        }
        $user_s_id=array();
        if(!empty($user_s)){
            foreach($user_s as $s){
                $user_s_id[]=$s->car_id;
            }
        }
        return view("frontend.wanted",["table"=>$table,"user_s_id"=>$user_s_id]);

    }

    public  function wantedSearch($col,$fill){
        $user_s_id=array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = SaveList::where("user_id", "=", session('userDetails')->id)->get();
            foreach($user_s as $s) {
                $user_s_id[] = $s->car_id;
            }
        }
        $table = new Wanted();
        $result = $table::with('brandWanted','modelWanted','varientWanted')->where($col, 'like', '%'.$fill.'%')->get();
        if (!empty($result) && count($result) != 0) {
            return response()->json(["status" => 1, "result" => $result,"s_user_id"=>$user_s_id]);
        }
        return response()->json(["status" => 0, "result" => ""]);
    }

    public  function  wantedFilters($querry){
        $user_s_id=array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = SaveList::where("user_id", "=", session('userDetails')->id)->get();
            foreach($user_s as $s) {
                $user_s_id[] = $s->car_id;
            }
        }
        $table = new Wanted();
        $result = $table::with('brandWanted','modelWanted','varientWanted')->whereraw($querry)->get();
        // dd($result);
        if (!empty($result) && count($result) != 0) {
            return response()->json(["status" => 1, "result" => $result,"s_user_id"=>$user_s_id]);
        }
        return response()->json(["status" => 0, "result" => ""]);
    }
    public  function  saveList($c_id){

        $save = new SaveList();
        $id =session('userDetails')->id;
        if($car=SaveList::where("user_id","=",$id)->where("car_id","=",$c_id)->first()){
            if($car->delete()){
                return response()->json(["status" => 1, "result" => "Car deleted"]);
            }
        }
        $save->user_id=$id;
        $save->car_id=$c_id;
        if($save->save()){
            return response()->json(["status" => 1, "result" => "okay"]);
        }
        return response()->json(["status" => 0, "result" => ""]);
    }

    public  function  WantedSearchFrontEnd (Request $request){
        $table = Wanted::with('brandWanted', 'modelWanted', 'varientWanted')->orderBy('created_at', 'desc')->where('title', 'like', '%'.$request->search.'%')->paginate(6);
        $user_s = array();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = SaveList::where("user_id", "=", session('userDetails')->id)->get();
        }
        $user_s_id=array();
        if(!empty($user_s)){
            foreach($user_s as $s){
                $user_s_id[]=$s->car_id;
            }
        }
        return view("frontend.wanted",["table"=>$table,"user_s_id"=>$user_s_id]);
    }

    public  function  saveListView(){
        $table = new SaveList();
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true){
            $user_s = SaveList::where("user_id", "=", session('userDetails')->id)->get();
        }
        $user_s_id=array();
        if(empty($user_s)){
            return response()->json(["status" => 0, "result" => ""]);
        }
        foreach($user_s as $s) {
            $user_s_id[] = $s->car_id;
        }
        $result = Wanted::wherein("id",$user_s_id)->with('brandWanted', 'modelWanted', 'varientWanted')->orderBy('created_at', 'desc')->paginate(6);
        if (!empty($result) && count($result) != 0) {
            return response()->json(["status" => 1, "result" => $result]);
        }
        return response()->json(["status" => 0, "result" => ""]);
    }

    public  function  wantedChat(Request $request){
        // dd($request->all());
        if ($request){
            // $package=UserPackage::select("packages.*,")->join("packages","user_packages.package_id","=","packages.id")->where("user_packages.user_id",session('userDetails')->id)->where("user_packages.role","main")->where("status",1)->first();
            // if($package){
            //     if($package->name==="Basic"){
            //         $auc=1;
            //         $swap=1;

            //     }
            //     else if($package->name==="Standard"){
            //         $auc=3;
            //         $swap=3;
            //         $pre=3;
            //     }
            //     else{
            //         $auc=9;
            //         $swap=9;
            //         $pre=9;
            //     }
            // }
            // else{
            //     return response()->json(["status" => 0, "msg" => ["Please Select any package "]]);
            // }
            // if(!empty($auc) && $request->car_availbilty[0]==="Auction"){
            //     $ch=User_Car::where("user_id",session('userDetails')->id)->where("car_availbilty","Auction")->where("id","!=",$request->c_id)->count();
            //     if($ch >=$auc){
            //         return response()->json(["status" => 0, "msg" => "Package Limit Exceed"]);
            //     }
            // }
            // if(!empty($swap) && $request->car_availbilty[0]==="Swap"){
            //     $ch=User_Car::where("user_id",session('userDetails')->id)->where("car_availbilty","Swap")->where("id","!=",$request->c_id)->count();
            //     if($ch >=$swap){
            //         return response()->json(["status" => 0, "msg" => "Package Limit Exceed"]);
            //     }
            // }
            // if(!empty($pre) && $request->car_availbilty[0]==="Prestige"){
            //     $ch=User_Car::where("user_id",session('userDetails')->id)->where("car_availbilty","Prestige")->where("id","!=",$request->c_id)->count();
            //     if($ch >=$auc){
            //         return response()->json(["status" => 0, "msg" => "Package Limit Exceed"]);
            //     }
            // }

            $chat = new WantedChat;
            $chat->query=$request->query1;
            $chat->proposal=$request->query2;
            $chat->car_id=$request->car_id;
            $chat->to_id=$request->to_id;
            $chat->from_id=session('userDetails')->id;
            if($chat->save()){
                return response()->json(["status"=>1,"result","okay"]);

            }
        }

        return response()->json(["status"=>0,"result","not okay"]);


    }
    public  function  viewChat(){
        if(!empty(session('userDetails')->id)){
            Chat::where("to","=",session('userDetails')->id)->update(["read_status"=>1]);
            $messenger=Messenger::where("_from","=",session('userDetails')->id)->orwhere("_to","=",session('userDetails')->id)->with(["to","from"])
                ->orderBy('last_msg_id', 'DESC')->get();
            //   dd($messenger[0]->Allmsg[0]->car_detail);
            //dd($messenger[0]->Allmsg);
            return view('frontend.messenger',["result"=>$messenger]);
        }
        else{
            return redirect()->route('chat.login',['chat'=>'chat_login']);
        }


    }
    public function single_chat(Request $request){
        if($request->id){
            $messenger=Messenger::where("id","=",$request->id)->with(["to","from"])->get();
            $html=View::make('frontend.chat')->with('result',$messenger)->render();
            return $html;
        }
    }

}
