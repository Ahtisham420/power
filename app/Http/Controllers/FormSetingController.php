<?php

namespace App\Http\Controllers;

use App\formMetaSetting;
use Illuminate\Http\Request;
use App\User_car;

class FormSetingController extends Controller
{
    //

    public function allEnginTypes(Request $request)
    {
        $posts = formMetaSetting::paginate(12);
        $model = "formMetaSetting";
        return view("site-settings.index", compact('posts', 'model'));
    }

    public function allSellTypes($model)
    {
       if ($model === "featured"){

            $posts = User_car::orderBy('created_at', 'desc')->where('featured','1')->paginate(8);
            return view("sellyourcar.index", compact('posts', 'model'));

        }else{

            $posts = User_car::orderBy('created_at', 'desc')->where('car_availbilty', '=', $model)->paginate(8);
            return view("sellyourcar.index", compact('posts', 'model'));

        }
    }

    public function update(Request $request)
    {
        dd($request->all());
    }

    public function DeleteCarSell($id, $model)
    {
        if (User_car::find($id)->delete())
            return redirect()->route('all-sell-types', ['model' => $model])->with('success', 'Data Deleted');
        else
            return redirect()->route('all-sell-types', ['model' => $model])->with('failure', 'Data Delete Failed');
    }

    public function SearchCarSell(Request $request, $model)
    {
        
       if ($model === "featured"){
            $posts =User_car::orderBy('created_at','desc')->where('title','like','%'.$request->search.'%')->where('featured','1')->paginate(8);
        }else{
            $posts =User_car::orderBy('created_at','desc')->where('title','like','%'.$request->search.'%')->where('car_availbilty','=',$model)->paginate(8);
        }
         $srch = $request->search;
         
        return view("sellyourcar.index", compact('posts', 'model','srch'));
    }
}