<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    
    function comment($id){

        $post=new Post;
        $post=$post->find($id);
        $comment = new Comment;
        $comments=$comment->all();
        // return view('postdetails',["comments"=>$comments]); 
        // $userId = Auth::user()->id;
        // $posts = Post::where('user_id', $userId)->with("comment")->get();
        // return $posts;

        // $user = Auth::user();
        // $posts = $user->posts();
    //   dd($posts);
        // foreach ($posts as $key => $value) {
        //   $posts[$key]->comment = Comment::where('post_id', $id)->get(); 
        //   }
          
        // return $posts;
      
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function feedBack($id)
    {
        //
        $post=new Post;
        $post=$post->find($id);

        $comment=new Comment;
        
      
        $comment->name=request("name");
        
        $comment->post_id=$id;
        $comment->comment=request("comment");
        $user_id=Auth::user()->id;
        $comment->user_id=$user_id;


        // dd($comment);
        $comment->save();
    return redirect()->back()->with('message', 'Thanks for your Feedback!');


        // dd($post);

        // $comment =
        // Comment::create([
        //     "name"=>$request["name"],
        //     "comment"=>$request["comment"],
        // ]);

        // dd($comment);
        
        // return redirect(route("postdetails"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
