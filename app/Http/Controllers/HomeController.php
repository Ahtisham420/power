<?php

namespace App\Http\Controllers;

use App\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Job;
use App\Provider;
use App\User;
use App\Service;
use App\UserPackage;
use Carbon\Carbon;
use Auth;
use App\User_car;
use App\Event;
use App\GarageAdvert;
use App\Wanted;
use App\Misecellinous;
use  App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobStats = array();
        $driverStats = array();
        $userStats = array();
        $otherStats = array();

        $jobStats["totalJobs"] = Job::count();
        $jobStats["cancelledJobs"] = Job::where("job_status", Job::cancel)->count();
        $jobStats["acceptedJobs"] = Job::where("job_status", Job::accept)->count();
        $jobStats["completedJobs"] = Job::where("job_status", Job::complete)->count();

        $driverStats["totalDrivers"] = Provider::whereHas('userDetails')->count();
        $driverStats["onlineDrivers"] = Provider::whereHas('userDetails')->where([["job_status", "!=", Provider::signedout]])->count();
        $driverStats["offlineDrivers"] = Provider::whereHas('userDetails')->where([["job_status", "=", Provider::signedout]])->count();
        $driverStats["bannedDrivers"] = User::where([["type", "=", User::provider], ["status", "=", User::banned]])->count();

        $userStats["totalUsers"] = User::where([["type", "=", User::customer]])->count();
        $userStats["activeUsers"] = UserPackage::where("status",1)->where('package_id',4)->where("post_per_package",">",0)->count();
        $userStats["bannedUsers"] = UserPackage::where("status",1)->where('package_id',5)->where("post_per_package",">",0)->count();

        $otherStats["totalTickets"] = Guide::count();
        $otherStats["totalservices"] = Service::count();
        $otherStats["totalDriverEarning"] = Job::where("job_status", Job::complete)->sum("service_price");
        $otherStats["avgJobs"] = (Job::whereYear('created_at', '=', Carbon::now()->year)
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->count()) / date("t");
         $america = User_car::where('car_availbilty','American-Muscle')->get()->count();
         $auction = User_car::where('car_availbilty','Auction')->get()->count();
         $rental = User_car::where('car_availbilty','Rent')->get()->count();
        $classified = User_car::where('car_availbilty','Sell')->get()->count();
        $swap = User_car::where('car_availbilty','Swap')->get()->count();
             $feature = User_car::where('featured','1')->get()->count();
        $event = Event::all()->count();
        $garage =GarageAdvert::all()->count();
        $wanted =Wanted::all()->count();
        $misc = Misecellinous::all()->count();
        $post = Post::all()->count();

        return view('home', compact("jobStats", "driverStats", "userStats", "otherStats",'misc','america','feature','wanted','post','garage','auction','rental','swap','classified','event'));
    }
    public function delete(Request $request)
    {
        // dd('del');
        $appPrefix = 'App';
        $model = ucfirst($request->model);
        $modelName = "$appPrefix \ $model";
        // dd($modelName);
        $modelName = str_replace(' ', '', $modelName);
        $modelValue = $modelName::find($request->id);
        if ($modelValue->delete()) {
            $response = ['success_msg' => trans('alert.record_delete_successfully')];
        } else {
            $response = ['error_msg' => trans('alert.record_unable_to_delete')];
        }
        return redirect(route($request->route))->withErrors($response);
    }
    public function profile()
    {
        $page_title = "Profile";
        return view("admin.profile", compact("page_title"));
    }

    public function passwordUpdate(Request $request)
    {
        $response = [];
        $validation_rules = [
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required'
        ];

        $request->validate($validation_rules);

        if (Hash::check($request->current_password, Auth::user()->password)) {
            $user = User::where('id', '1')->first();
            $user->password = Hash::make($request->new_password);
            if ($user->save()) {
                $response = ['success_msg' => trans('alert.record_updated')];
            } else {
                $response = ['error_msg' => trans('alert.record_unable_to_save')];
            }
        }
        return redirect()->back()->withErrors($response);
    }
}
