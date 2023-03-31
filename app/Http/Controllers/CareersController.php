<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;

class CareersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Career::orderBy('id', 'desc')->paginate(8);

        return view('careers.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("careers.create");
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
            'title'=>'required',
            'location'=>'required',
        ]);
        $event  = new  Career();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->map_lat = $request->maplat;
        $event->map_lng = $request->maplng;
        if ($request->file('image')){
            $cover = $request->file('image');

            $extension = $cover->getClientOriginalExtension();
            $feature_img_name = time().'.'.$extension;
            $destinationPath = public_path('careers_images/');
            $cover->move($destinationPath, $feature_img_name);
            $event->img = $feature_img_name;
        }
        if($event->save()){
            return redirect()->route('careers.index');
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
        $career = Career::where('id',$id)->first();
        return view('frontend.careers',compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Career::find($id);
        return view('careers.edit', compact('post'));
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
        $request->validate([
            'title'=>'required',
            'location'=>'required',
        ]);

        $event  = Career::find($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->map_lat = $request->maplat;
        $event->map_lng = $request->maplng;
        if ($request->file('image')){
            $cover = $request->file('image');
            $extension = $cover->getClientOriginalExtension();
            $feature_img_name = time().'.'.$extension;
            $destinationPath = public_path('careers_images/');
            $cover->move($destinationPath, $feature_img_name);
            $event->img = $feature_img_name;
        }
        if($event->save()){
            return redirect()->route('careers.index');
        }
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
}
