<?php

namespace App\Http\Controllers;

use App\CarSetting;
use Illuminate\Http\Request;
use App\ReportCar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CarSettingController extends Controller
{
    public function all(Request $request)
    {

        $key = $request->key;
        $posts = CarSetting::with("brand_name")->where("_key","=",$key)->orderBy('id', 'desc')->paginate(8);
          if($request->has('key')){
            return self::filterdData($request);
        }
        return view('car-setting.index', compact('posts','key'));
    }

    public function create(Request $request)
    {
        $key = $request->key;
        return view('car-setting.create', compact('key'));
    }
   
   
   public  function search(Request $request,$key){
       
    $posts =CarSetting::with("brand_name")->orderBy('created_at','desc')->where('_value','like','%'.$request->search.'%')->where('_key','=',$key)->paginate(8);
    $srch = $request->search;
    return view('car-setting.index', compact('key','posts','srch'));
    
}

      public  function BrandFilter(Request $request,$key){
          
        if ($request->model){
            $posts =CarSetting::with("brand_name")->orderBy('created_at','desc')->where('model','=',$request->model)->where('_key',$key)->paginate(8);
            }else{
            $posts =CarSetting::with("brand_name")->orderBy('created_at','desc')->where('brand','=',$request->brand)->where('_key',$key)->paginate(8);
        }

        return view('car-setting.index', compact('key','posts'));
   }
   
     
    public function save(Request $request)
{
   //dd($request->all());
        if (!empty($request->id) && $request->id > 0){
            if ($request->file('icon')){
                $request->validate([
                    '_value' => 'required',
                    'icon' =>'required|image|mimes:png,|max:2048',
                ]);
            }elseif ($request->model){
                $request->validate([
                    'model' => 'required',
                    '_value' =>'required',
                ]);
            }else{
                $request->validate([
                    '_value' => 'required'
                ]);
            }


        }else{
            if ($request->file('icon')){
                $request->validate([
                 '_value' => 'required|unique:car_settings,_value,NULL,id',
                    'icon' =>'required|image|mimes:png,|max:2048',
                ]);

            }elseif ($request->model){
                $request->validate([
                    'model' => 'required',
                   '_value' => 'required',
                ]);
            }else{
                $request->validate([
                   '_value' => 'required',
                ]);
            }

        }

        if (!empty($request->id) && $request->id > 0){


            if ($request->file('icon')){
                 $response = CarSetting::find($request->id);
                    $cover = $request->file('icon');
                    $extension = $cover->getClientOriginalExtension();
                    $feature_img_name = time().'.'.$extension;
                    $destinationPath = public_path('car_icon/');
                    $cover->move($destinationPath, $feature_img_name);
                    $response->icon = $feature_img_name;
                    $response->_key = $request->_key;
                    $response->_value =  $request->_value;
                    $response->save();

                }elseif($request->brand){
                $response = CarSetting::find($request->id);
                $response->brand = $request->brand;
                if($request->model){
                          $response->model = $request->model;
                }
                $response->_key = $request->_key;
                $response->_value =  $request->_value;
                $response->save();
            }elseif ($request->model){
                $response = CarSetting::find($request->id);
                $response->model = $request->model;
                $response->_key = $request->_key;
                $response->_value =  $request->_value;
                $response->save();
            }else{
                $response = CarSetting::where('id', $request->id)->update([
                    '_value' => $request->_value
                ]);
            }

        }else {

            if ($request->file('icon')){
                    $response = new CarSetting();
                    $cover = $request->file('icon');

                    $extension = $cover->getClientOriginalExtension();
                    $feature_img_name = time().'.'.$extension;
                    $destinationPath = public_path('car_icon/');
                    $cover->move($destinationPath, $feature_img_name);
                    $response->icon = $feature_img_name;

                $response->_key = $request->_key;
                $response->_value =  $request->_value;
                $response->save();

                }elseif ($request->brand){
                $response = new CarSetting();
                $response->brand = $request->brand;
                if($request->model){
                        $response->model = $request->model;
                }
                $response->_key = $request->_key;
                $response->_value =  $request->_value;
                $response->save();
            }elseif ($request->model) {
                $response = new CarSetting();
                $response->model = $request->model;
                $response->_key = $request->_key;
                $response->_value = $request->_value;
                $response->save();
            }else{
                $response = CarSetting::create([
                    '_key' => $request->_key,
                    '_value' => $request->_value
                ]);
            }

        }

        if ($response) {
            return redirect()->route('all-car-settings',["key" => $request->_key])->with('success', 'Operation Successfull!');
        } else {
            return redirect()->route('all-car-settings',["key" => $request->_key])->with('failure', 'Operation Failed!');
        }
    }

    public function show(Request $request)
    {
        $key = $request->key;
        $brand = CarSetting::find($request->id);
        return view('car-setting.edit', compact('brand','key'));
    }

    public function updateStatus(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'status' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                if (CarSetting::where('id', $request->id)->update(['status' => $request->status])) {
                    $response = [
                        'code' => 200,
                        'data' => ["status" => $request->status, "id" => $request->id],
                        'error_msg' => trans('alert.record_updated')
                    ];
                } else {
                    $response = [
                        'code' => 500,
                        'data' => [],
                        'error_msg' => trans('alert.record_unable_to_save')
                    ];
                }
            }
        } else {
            $response = [
                'code' => 405,
                'data' => [],
                'error_msg' => trans('alert.invalid_request_method')
            ];
        }
        return response()->json($response);
    }

    public function updateTop(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'top_list' => 'required'
            ]);
            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                if (CarSetting::where([['id', '=', $request->id]])->update(['top_list' => $request->top_list])) {
                    $response = [
                        'code' => 200,
                        'data' => ["top_list" => $request->top_list, "id" => $request->id],
                        'error_msg' => trans('alert.record_updated')
                    ];
                } else {
                    $response = [
                        'code' => 500,
                        'data' => [],
                        'error_msg' => trans('alert.record_unable_to_save')
                    ];
                }
            }
        } else {
            $response = [
                'code' => 405,
                'data' => [],
                'error_msg' => trans('alert.invalid_request_method')
            ];
        }
        return response()->json($response);
    }

    public function delete($id,$key)
    {
        if (CarSetting::find($id)->delete())
            return redirect()->route('all-car-settings',['key'=>$key])->with('success', 'Data Deleted');
        else
            return redirect()->route('all-car-settings',['key'=>$key])->with('failure', 'Data Delete Failed');
    }
public static function filterdData($request){
        $users = [];
        $filters = [];
        $results = false;
         $key = $request->typ;
        if(!empty($request->filter_status && $request->filter_status != "false")) {
            $filters[] = [
                "status", '=',$request->filter_status
            ];
        }
        if(!empty($request->filter_country && $request->filter_country != "false")) {
            $filters[] = [
                "CountryCode" , '=', $request->filter_country
            ];
        }
        if(!empty($request->filter_brand && $request->filter_brand != "false")){
            $filters[] = [
                "brand" , '=', $request->filter_brand
            ];
        }
        if(!empty($request->filter_model && $request->filter_model != "false")){
            $filters[] = [
                "model" , '=', $request->filter_model
            ];
        }
        if(!empty($request->filter_age && $request->filter_age != "false")) {
            $filters[] = [
                "age" , '=', $request->filter_age
            ];
        }
        if(!empty($request->filter_id_type && $request->filter_id_type != "false")) {
            $filters[] = [
                "id_type" , '=', $request->filter_id_type
            ];
        }
        if(!empty($request->filter_id_verification && $request->filter_id_verification != "false")) {
            $filters[] = [
                "identity_verification" , '=', $request->filter_id_verification
            ];
        }
        if($request->filter_user_types >= 0 && $request->filter_user_types != null) {
            $filters[] = [
                "type" , '=', $request->filter_user_types
            ];
        }
        if(!empty($request->filter_gender && $request->filter_gender != "false")) {
            $filters[] = [
                "gender" , '=', $request->filter_gender
            ];
        }
        if(!empty($request->filter_from_date)) {
            $filters[] = ['created_at', '>=', $request->filter_from_date];
        }
        if(!empty($request->filter_to_date)) {
            $filters[] = ['created_at', '<=', $request->filter_to_date];
        }
        if(!empty($request->filter_search)) {
            $columns = array('_value');
            $users = CarSetting::search($request->filter_search,$columns);
//            dd($request->filter_search);
        }else {
            $users = CarSetting::where($filters);
        }
//        dump($filters);
        $posts = $users->where($filters)->orderBy('id', 'desc')->where('_key',$request->typ)->paginate(10);
        if($request->has('filter_reset')){
            $posts = CarSetting::orderBy('id', 'desc')->where('_key',$request->typ)->paginate(10);
        }

        if(!$request->has('filter_csv_export')){
            $html = View::make('car-setting.partials.table',['posts'=>$posts,'key'=>$key])->render();
            $results = response()->json($html);
        }else{
            return (new UsersExport($filters))->download('car-setting.xlsx');
        }
        return $results;
    }
    public  function  CarReport(){
        $posts = ReportCar::orderBy('id', 'desc')->paginate(8);
        return view('report.index', compact('posts'));
    }
    public function DeleteReportCar($id)
    {
        if (ReportCar::find($id)->delete())
            return redirect()->route('car-report-list')->with('success', 'Data Deleted');
        else
            return redirect()->route('car-report-list')->with('failure', 'Data Delete Failed');
    }
}
