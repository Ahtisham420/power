<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\CarSetting;
use App\User_car;
use App\Cookie;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
//use function GuzzleHttp\json_decode;

class ApiController extends Controller
{
    public $IsLive = true;
    public $Username = "";
    public $Password = "";
    public $VRM = "";
    public $VIN = "";
    public $CurrentMileage = "0";
    public $CapVehicleValues = false;
    public $CapLiveVehicleValues = false;
    public $GlassVehicleValues = false;
    public $CapCode = false;
    public $GlassModelID = false;
    public $GlassQualifier = false;
    public $CapID = false;
    public $MCIData = false;
    public $DVLASMMTDescription = false;
    public $VED = false;
    public $MileageCheckRequired = false;
    public $BlackBookPlusValues = false;
    public $PreviousSearchRecords = false;
    public $HighRiskRecords = false;
    public $StolenVehicleRecords = false;
    public $ConditionRecords = false;
    public $PlateChanges = false;
    public $FinanceRecords = false;
    public $ColourChanges = false;
    public $KeeperChanges = false;
    public $PerformanceAndConsumptionData = false;
    public $EngineAndTechnicalData = false;
    public $WeightAndDimensionsData = false;
    public $TVI = false;
    public $CapCodeMultiMatch = false;
    public $KCodes = false;
    public $BoschCodes = false;
    public $EngineCodes = false;
    public $GlassShortCode = false;
    public $InlineDocuments = false;
    public $Documents = "";

    public  function findcar(Request $request)
    {


        $reg = $request->reg;
        $mileage  = $request->mileage;
        $vrmToSearch = $reg;
        //      $user = 'AUTOMXINUATG0378';
        //      $pass = 'DGA54OBQ';
        $user = 'POWERPERFORJ0765LIVE';
        $pass = 'JNHH00^56KJH!(JNLOLI';
        $vrmToSearch = $reg;
        $params = new ApiController();
        $params->Username = $user;
        $params->Password = $pass;
        $params->VRM = $vrmToSearch;
        try {

            $opts = array(
                'http' => array(
                    'user_agent' => 'PHPSoapClient'
                )
            );

            $context = stream_context_create($opts);
            $client = new \SoapClient('https://www.automotivemxin.com/SOAP/Service.asmx?wsdl', array(
                'stream_context' => $context,
                'cache_wsdl' => WSDL_CACHE_NONE
            ));
            $response = $client->__soapCall("GetVehicleData", array('classpmap' => array('VehicleRegInput' => $params)));
            // dd($response->GetVehicleDataResult->VehicleRegistration->VRM  );
            //$array = new stdClass();
            // $array=json_decode(json_encode( $response));
            //dd( $response->GetVehicleDataResult->MessageDetails->Message[0]->MsgLine1  );
            // dd($response->GetVehicleDataResult->VehicleRegistration->EngineCapacity);
            // echo '<br>';
            // echo'<pre>';
            // print_r($array);
            // echo '</pre>';
            // var_dump($response); 
            // return  view('api',['response'=>$response]);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'result' => $e]);
        }
        return response()->json(['status' => 1, 'result' => $response]);
    }
    public function reg(Request $request)
    {

        $reg = $request->reg;
        $mileage  = $request->mileage;
        $vrmToSearch = $reg;
        //      $user = 'AUTOMXINUATG0378';
        //      $pass = 'DGA54OBQ';
        $user = 'POWERPERFORJ0765LIVE';
        $pass = 'JNHH00^56KJH!(JNLOLI';
        $vrmToSearch = $reg;
        $params = new ApiController();
        $params->Username = $user;
        $params->Password = $pass;
        $params->VRM = $vrmToSearch;
        try {

            $opts = array(
                'http' => array(
                    'user_agent' => 'PHPSoapClient'
                )
            );

            $context = stream_context_create($opts);
            $client = new \SoapClient('https://www.automotivemxin.com/SOAP/Service.asmx?wsdl', array(
                'stream_context' => $context,
                'cache_wsdl' => WSDL_CACHE_NONE
            ));
            $response = $client->__soapCall("GetVehicleData", array('classpmap' => array('VehicleRegInput' => $params)));
            //$array = new stdClass();
            // $array=json_decode(json_encode( $response));
            //dd( $response->GetVehicleDataResult->VehicleRegistration  );
            // dd($response->GetVehicleDataResult->VehicleRegistration->EngineCapacity);
            // echo '<br>';
            // echo'<pre>';
            // print_r($array);
            // echo '</pre>';
            // var_dump($response); 
            // return ;

        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'result' => $e]);
        }

        if ($response->GetVehicleDataResult) {
            session()->put("product", $response);
            $cartItems = Session()->get('product');

                if ($cartItems->GetVehicleDataResult->MileageDetails->InputMileage == 0) {
                    $cartItems->GetVehicleDataResult->MileageDetails->InputMileage = $request->mileage;
                    //$cartItems->save();
                       // Session::set('cartItems', $cartItems);
                  //  dd($cartItems->GetVehicleDataResult->MileageDetails->InputMileage);

                }


            if ($request->session()->has('userLoggedIn')) {
                $url =  route("sell-your-car");
            } else {
                    //session()->flash('product', $response);
                //$a=  $request->session()->get('product');
                $url =  route("user-login");
//                env('APP_URL')."user/login";
            }
            return response()->json(['status' => 1, 'result' => $response, 'url' => $url]);
        } else {
            return response()->json(['status' => 0, 'result' => ""]);
        }
    }

    public function statuschange()
    {
    }
public  function  HomeFrontFilters($query,$b=null,$m=null,$y=null){
    $table = new User_car();
        if ($query == "all"){
            if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true) {
                $result = $table::orderBy("created_at", "desc")->where("user_id","!=",session('userDetails')->id)->paginate(12);
            }else{
                $result = $table::orderBy("created_at","desc")->paginate(12);
            }

        }else{
            $query = base64_decode($query);
            if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true) {
                $result = $table::whereraw($query)->where("user_id","!=",session('userDetails')->id)->paginate(12);
            }else{
                $result = $table::whereraw($query)->paginate(12);
            }


        }

    return view('frontend.home-filters',['result'=>$result,'query'=>$query,'br'=>$b,'md'=>$m,'yr'=>$y]);
}
    public function HomeFilters($query,$val=null)
    {

       //dd($request->all());
        //  $url = url('/home/filters');
        $table = new User_car();
        if ($query == "null"){
            if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true) {
                $result = $table::with('d_brand', 'd_model')->orderBy("created_at", "desc")->where("user_id","!=",session('userDetails')->id)->paginate(12);
            }else{
                $result = $table::with('d_brand', 'd_model')->orderBy("created_at", "desc")->paginate(12);
            }
        }else {
            $query = base64_decode($query);
            $val = '[' . $val . ']';
            if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true) {
                $result = $table::with('d_brand', 'd_model')->whereraw($query)->where("user_id", "!=", session('userDetails')->id)->paginate(12);
                }else {
                $result = $table::with('d_brand', 'd_model')->whereraw($query)->paginate(12);
            }
        }
        //   return redirect("/home/filters");

        // dd($query,$val);
       // $m = CarSetting::all();
//        if ($m){
//            foreach ($m as $a){
//                $contains = Str::contains($query,[$a->id, $a->_value]);
//            }
//       dd($contains);
//        }

//        $v =  view('frontend.home-filters',['result'=>$result,'query'=>$query]);

//        return response()->json(['status'=>1,'result' => $v]);
         return view("frontend.home-filters",['result'=>$result,'query'=>$query,'select'=>$val]);

        // return view('frontend.home-filters',['result'=>$result]);

        //dd($result);

        /*if ($request->isMethod("post")) {
            $year = $request->year;
            $price = $request->price;
            $mileage = $request->mileage;
            $condition = $request->car_condition;
            $engine_size = $request->engine_size;
            $transmission = $request->transmission;
            $boot_spoiler = $request->boot_spoiler;
            $exhaust = $request->exhaust;
            $color = $request->color;
            $interior = $request->interior;
            $body_type = $request->body_type;
            $engine_type = $request->engine_type;
            $engine_size = $request->engine_size;
            $condition = $request->car_condition;
            $car_make = $request->car_make;
            $car_type = $request->car_type;
            $modal = $request->modal;
            $car_make = $request->car_make;
            //$request = $request->all();
            $table = new User_car();
            // $result = $table::where("price", "=", $price)->get();
            dd($request);



            //return response()->json(['status' => 1, "result" => $array]);
            //  $result = CarSetting::where("_value", "=", $request->_value)->get();
            //dd($result);
        } else {
            //return response()->json(['status' => 0, 'result' => ""]);
        }*/
    }
    public  function cookie(Request $request){
        setcookie("powerperformance_cookie", $request->cookie_n, time() + (10 * 365 * 24 * 60 * 60), "/");
        $cookie_v=$request->cookie_n;
        $cookie = new Cookie;
            $cookie->c_name=$cookie_v;
            if($cookie->save()){
                return response()->json(["status"=>1,"result"=>""]);
            }
        return response()->json(["status"=>0,"result"=>""]);
    }



   }
