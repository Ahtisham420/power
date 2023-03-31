<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PPCNewsLetter;
use Auth;
use App\CrownJob;
use App\FooterMail;
class PPCNewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PPCNewsLetter::orderBy('id', 'desc')->paginate(8);

        return view('ppc.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ppc.create");
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
            'mail_body' => ['required', 'max:2000000'],
        ]);
        $event  = new  PPCNewsLetter();
        $event->mail_body = $request->mail_body;
        $event->subject = $request->subject;
        $event->status = $request->status;
         if($event->save()){

$mail = FooterMail::where("status","=","0")->get();


foreach ($mail as $m){
    $s_mail = new  CrownJob();
$s_mail->email = $m->mail;
    $s_mail->mail_id = $event->id;
    $s_mail->save();

}

    return redirect()->route('ppc.index');


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
            $post = PPCNewsLetter::find($id);
        return view("frontend.mail-template",["mail"=>$post]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = PPCNewsLetter::find($id);
        return view('ppc.edit', compact('post'));
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
            'mail_body' => ['required', 'max:2000000'],
        ]);
        $event  = PPCNewsLetter::find($id);
        $event->mail_body = $request->mail_body;
        $event->subject = $request->subject;
        $event->status = $request->status;
        if($event->save()){
            return redirect()->route('ppc.index');
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

