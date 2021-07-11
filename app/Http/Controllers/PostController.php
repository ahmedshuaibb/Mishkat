<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=new Category;
        $categories=$categories->all();
        $posts= Post::all();
        return view('admin.all_posts',["posts"=>$posts,"categories"=>$categories]);
    }
    public function index1()
    {
        //
        $categories=new Category;
        $categories=$categories->all();
        $posts= Post::all();
        return view('home',["posts"=>$posts,"categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add_post');
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
        $request->validate([
            "title"=>"required", 
            "body"=>"required",
            "image"=> "required|mimes:jpeg,png,jpg,gif,svg|max:5048",
            ]);
        // $newImageName = uniqid() . '-' . $request->title . '-' . 
        // $request->image->extension();

        // $request->image->move(public_path('postimg'),$newImageName);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename =rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postimg/'), $filename);
            $filename='postimg/'.$filename;
        }
       
         Post::create([
            "title"=>$request["title"],
            "body"=>$request["body"],
            "image"=>$filename,
            "user_id"=>auth()->user()->id,
            "category_id"=>$request["category"]
 
        ]);

  // dd($posts);
        return redirect(route("posts.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories=new Category;
        $categories=$categories->all();
        return view("admin.viewpost",["post"=>$post,"categories"=>$categories]);
    }

    public function singlePost(Post $post)
    {
        $categories=new Category;
        $categories=$categories->all();
        return view("postdetails",["post"=>$post,"categories"=>$categories]);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view("admin.edit_post",["post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $post->update([
          
            "title"=>$request["title"],
            "body"=>$request["body"],
            "user_id"=>auth()->user()->id,
                 ]);

      return redirect(route("posts.index",["post"=>$post]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect(route("posts.index"));
    }
}
