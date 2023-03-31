<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeImage;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = HomeImage::orderBy('id', 'desc')->paginate(8);
        return view('home-image.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("home-image.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required',
        ]);
        $img  = new  HomeImage();
        $img->user_id = Auth::user()->id;

        if ($request->file('image')){
            $cover = $request->file('image');
            $extension = $cover->getClientOriginalExtension();
            $feature_img_name = time().'.'.$extension;
            $destinationPath = public_path('home_images/');
            $cover->move($destinationPath, $feature_img_name);
            $img->image = $feature_img_name;
        }
        if($img->save()){
            return redirect()->route('homeImage.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = HomeImage::find($id);
        return view('home-image.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $img  = HomeImage::find($id);
        $img->user_id = Auth::user()->id;
        if ($request->file('image')){
            $cover = $request->file('image');
            $extension = $cover->getClientOriginalExtension();
            $feature_img_name = time().'.'.$extension;
            $destinationPath = public_path('home_images/');
            $cover->move($destinationPath, $feature_img_name);
            $img->image = $feature_img_name;
        }
        if($img->save()){
            return redirect()->route('homeImage.index');
        }
        return redirect()->route('homeImage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public  function HomeStatus($id){


        $rows = HomeImage::where('status', '=', 1)->get();
        foreach($rows as $row) {
            $row->status = 0;
            $row->save();
        }
        $st = HomeImage::find($id);
        $st->status = 1;
        if ($st->save()){
            return redirect()->back();
            }
        //DB::table('HomeImage')->where('status','=', '0')->update(['status' => '1']);
     //   dd($id);
        //HomeImage::update(["status"=>0]);
        //dd($request->all());
        //        if (){
//
//        }

    }
}
