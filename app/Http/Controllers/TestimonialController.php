<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonial;
use Auth;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Testimonial::orderBy('id', 'desc')->paginate(8);

        return view('testimonial.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("testimonial.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request->all());
        $request->validate([
            'user_name'=>'required',
            'post_body' => ['required', 'max:2000000'],
        ]);
        $event  = new  Testimonial();
        $event->user_name = $request->user_name;
        $event->body = $request->post_body;
        $event->user_id = Auth::user()->id;
        if ($request->file('image')){
            $cover = $request->file('image');

            $extension = $cover->getClientOriginalExtension();
            $feature_img_name = time().'.'.$extension;
            $destinationPath = public_path('testimonial_images/');
            $cover->move($destinationPath, $feature_img_name);
            $event->img = $feature_img_name;
        }
        if($event->save()){
            return redirect()->route('testimonial.index');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Testimonial::find($id);
        return view('testimonial.edit', compact('post'));
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
        //dd($request->all(),$id);
        $request->validate([
            'user_name'=>'required',
            'post_body' => ['required', 'max:2000000'],

        ]);

        $event  = Testimonial::find($id);
        $event->user_name = $request->user_name;
        $event->body = $request->post_body;
        $event->user_id = Auth::user()->id;
        if ($request->file('image')){
            $cover = $request->file('image');

            $extension = $cover->getClientOriginalExtension();
            $feature_img_name = time().'.'.$extension;
            $destinationPath = public_path('testimonial_images/');
            $cover->move($destinationPath, $feature_img_name);
            $event->img = $feature_img_name;
        }
        if($event->save()){
            return redirect()->route('testimonial.index');
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
