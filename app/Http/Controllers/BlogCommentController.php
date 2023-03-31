<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\CarComment;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = Comment::withoutGlobalScopes()->orderBy("created_at", "desc")
            ->with("post");

        if ($request->get("waiting_for_approval")) {
            $comments->where("approved", false);
        }

        $comments = $comments->paginate(100);
        return view("comments.index")
            ->withComments(
                $comments
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       // dd($request->all(),session('userDetails')->id);
        $request->validate([
            'post_id' => 'required',
            'comment' => ['required', 'string', 'min:1', 'max:255'],

        ]);
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = session('userDetails')->id;
        $comment->author_name= $request->author_name;
        $comment->comment = $request->comment;
//        $comment->first_name = $request->first_name;
//        $comment->last_name = $request->last_name;
//        $comment->subject = $request->subject;
        if ($comment->save()){
          return   redirect()->route('frontend-blog',['id'=>base64_encode($request->post_id)]);
        }
              return redirect()->back()->with('failure', 'Comment not Post!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }



    /**
     * Approve a comment
     *
     * @param $blogCommentId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($blogCommentId)
    {
        $comment = Comment::withoutGlobalScopes()->findOrFail($blogCommentId);
        $comment->approved = true;
        $comment->save();

        return redirect()->route('comments.index')->with('success', 'Comment is Approved');
    }


    /**
     * Delete a submitted comment
     *
     * @param $blogCommentId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($blogCommentId)
    {
        $comment = Comment::withoutGlobalScopes()->findOrFail($blogCommentId);
        $comment->delete();
        return back();
    }

public  function CarComments(){
    $comments = CarComment::with('user','car')->orderBy('id','desc')->paginate(12);
return view('comments.car-comment',compact('comments'));
}




}
