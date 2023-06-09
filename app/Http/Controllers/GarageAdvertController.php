<?php

namespace App\Http\Controllers;

use App\User_car;
use Illuminate\Http\Request;
use  App\GarageAdvert;
use  App\User;
use App\GarageRating;
use  App\GarageFeedBack;
use App\Notifications\Appnotify;
use App\SwapCar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
class GarageAdvertController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'c_name' => 'required',
            'description' => 'required',
            'deal_item' => 'required',
            'compan_mail' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                $image = $request->file('image');
                $name = $image->getClientOriginalName();
           //     $size = $image->getClientSize();
                $destinationPath = public_path('/garage_avatar');
                $image->move($destinationPath, $name);
                $garage = new GarageAdvert;
                $garage->c_name=$request->c_name;
                $garage->user_id = session('userDetails')->id;
                $garage->description=$request->description;
                $garage->deal_item=$request->deal_item;
                $garage->compan_mail=$request->compan_mail;
                $garage->pic=$name;
                $garage->save();
               if($garage->save()){

               }


            }
        }
        return redirect()
            ->route('user-dashboard', ["tab" => "GarageAdverts"])->withErrors($validator);

    }

      public function index(){
        $garages = GarageAdvert::orderBy('created_at','desc')->where('category','Garage')->paginate(6);
      //  dd($garages);
return view("frontend.garage-services",["garages"=>$garages]);
    }
    public function BodyIndex(){
        $garages = GarageAdvert::orderBy('created_at','desc')->where('category','body-shop')->paginate(6);
      //  dd($garages);
return view("frontend.body-shop-services",["garages"=>$garages]);
    }

    public  function  Search($col,$val){
        $table = new GarageAdvert();
        $result = $table::where($col,'like','%'.$val.'%')->get();
        if (!empty($result) && count($result) !=0 ){
return response()->json(["status" => 1, "result" => $result]);
        }
        return  response()->json(["status" => 0, "result" => ""]);
    }

public function garagEmail(Request $request){
        $u_email =User::where("id","=",$request->g_userId)->first();
        $email =  $request->email;
        Mail::send("frontend.garage-mail",["u_email"=>$u_email],function ($m) use ($u_email,$email){
        $m->from($email, $email);
        $m->to($u_email->email)->subject("PowerPerformance Garage");
    });
    if(!empty($u_email) && $u_email !== "" ){
    return response()->json(["status"=>1,"result"=>"okay"]);
}

return response()->json(["status"=>0,"result"=>""]);

}



    public function miscEmail(Request $request){
        $u_email =User::where("id","=",$request->m_userId)->first();
        $email = $request->email;
        Mail::send("frontend.garage-mail",["u_email"=>$u_email],function ($m) use ($u_email,$email){
            $m->from($email, $email);
            $m->to($u_email->email)->subject("PowerPerformance Garage");
        });
        if(!empty($u_email) && $u_email !== "" ){
            return response()->json(["status"=>1,"result"=>"okay"]);
        }

        return response()->json(["status"=>0,"result"=>""]);

    }


    public  function  SwapId(Request $request){
       $swap = new SwapCar();
       $swap->user_id=session('userDetails')->id;
       $r_id = $request->swap_list;
       $s_id = $request->swap_car;
       $swap->swap_list_id=$request->swap_list;
       $swap->swap_car_id=$request->swap_car;
       if ($swap->save()){
           $u_id =User_car::where("id","=",$request->swap_car)->first();
           $email = User::where("id","=",$u_id->user_id)->first();
           $email = $email->email;

           $own_id = User_car::where("id","=",$request->swap_list)->first();
           $own_email = User::where("id","=",$own_id->user_id)->first();
           Mail::send("frontend.swap-mail",["car_detail"=>$u_id,"car_u"=>$own_email,'r_id'=>$r_id,'s_id'=>$s_id],function ($m) use ($own_email,$email){
               $m->from($email, $email);
               $m->to($own_email->email)->subject("PowerPerformance Swap");
           });

           return response()->json(["status"=>1,"msg"=>"Your Request has been sent."]);
       }else{
           return response()->json(["status"=>0,"msg"=>"Try Again Later."]);
       }

       }

       public  function  swapDeclineRequest($id,$o_id){
           $id = base64_decode($id);
           $o_id =base64_decode($o_id);

           $u_id =User_car::where("id","=",$id)->first();
           $email = User::where("id","=",$u_id->user_id)->first();
           if (!empty($email)) {
               $own_id = User_car::where("id", "=",$o_id)->first();
               $own_email = User::where("id", "=", $own_id->user_id)->first();
               Mail::send("frontend.swap-reject-mail", ["car_detail" => $u_id, 'car_u' => $email], function ($m) use ($own_email, $email) {
                   $email = $email->email;
                   $m->from($email, $email);
                   $m->to($own_email->email)->subject("PowerPerformance Swap");
               });
            return   redirect()->route('frontend-home');
           }


       }

       public  function  swapStatusChat($id){
        $id = base64_decode($id);
        $table = new SwapCar();
      $c_id = $table::where("swap_car_id","=",$id)->first();

      if($id &&  $c_id->status == 0 ){
    $swap= SwapCar::where('swap_car_id','=',$id)->first();

        $swap->status = 1;
         if ($swap->save()){
             return view('frontend.swap-massenger');
         }

       }else{
          return view('frontend.swap-massenger');
      }


       }
       
       
       
           public  function  GarageRating($id,$c_id){
        $reating = new GarageRating();
        $reating->user_id = session('userDetails')->id;
        $reating->car_id = $c_id;
        $reating->rating  = $id;
        if($reating->save()){
            return response()->json(['status'=>1,'result' => 'Rating Inserted']);
        }
        return response()->json(['status'=>1,'result' => 'Something Was Wrong']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
   public  function  GetGarageFeed($id){

        $feed=GarageFeedBack::with('user')->where('garage_id',$id)->get();
        if (!empty($feed)){
            return response()->json(['status'=>1,'result' => $feed]);
        }
        return response()->json(['status'=>0,'result' => ""]);

    }
    
        public  function  GarageFeedBack(Request $request){
        $request->validate([
            'garage_id' => 'required',
            'feedback' => ['required', 'string', 'min:1', 'max:255'],
       ]);

        $feed = new GarageFeedBack();
        $feed->garage_id = $request->garage_id;
        $feed->user_id = session('userDetails')->id;
        $feed->feedback = $request->feedback;


        if ($feed->save()){
            return   redirect()->route('garage');
        }

        return redirect()->back()->with('failure', 'Comment not Post!');
    }
   public function edit($id)
    {
     $g_edit = GarageAdvert::find($id);

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

    }
}
