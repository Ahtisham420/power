<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TermCondition;
class TermConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = TermCondition::orderBy('id', 'desc')->paginate(8);

        return view('term-condition.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("term-condition.create");
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
            'body' => ['required', 'max:2000000'],
        ]);
        $event  = new  TermCondition();
        $event->body = $request->body;
        $event->status = $request->status;
        if($event->save()){
            return redirect()->route('term-condition.index');
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
        $post = TermCondition::find($id);
        return view('term-condition.edit', compact('post'));
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
            'body' => ['required', 'max:2000000'],
        ]);
        $event  = TermCondition::find($id);
        $event->body = $request->body;
        $event->status = $request->status;
        if($event->save()){
            return redirect()->route('term-condition.index');
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
