<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use App\Http\Requests\StorePost;
// use Illuminate\Support\Facades\DB;

class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lazy Loading vs Eager Loading
        // DB::connection()->enableQueryLog();
        // $posts = BlogPost::with('comments')->get();
        // foreach($posts as $post){
        //     foreach($post->comments as $comment){
        //         echo $comment->content;
        //     }
        // }
        // dd(DB::getQueryLog());

        /**Query relationship existence
         * BlogPost::has('comments')->get();
         * $posts = BlogPost::has('comments','>=',2)->get();
         * $posts = BlogPost::whereHas('comments,function($query){
         *  $query->where('content','like','%abc%');
         * })->get();
         */
        /**Query relationship absence
         * BlogPost::doesntHave('comments')->get();
         * $posts = BlogPost::whereDoesntHave('comments',function($query){$query->where('content','like','%abc%');})->get();
         */
        /**Counting related models
         * $posts = BlogPost::withCount('comments')->get();
         * BlogPost::withCount(['comments','comments as new_comments' => function($query){ $query->where('created_at','>=','2020-04-10 12:31:48');}])->get();
         */

        $posts = BlogPost::withCount('comments')->get();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost  $request)
    {

        $validatedData = $request->validated();
        $blogPost = BlogPost::create($validatedData);
        $request->session()->flash('status','Blog post was created!');

        return redirect()->route('posts.show',['post' => $blogPost->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $validatedData = $request->validated();
        $post->fill($validatedData);
        $post->save();
        $request->session()->flash('status','Blog post was updated!');

        return redirect()->route('posts.show',['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();

        // BlogPost::destroy($id);

        $request->session()->flash('status','Blog post was deleted!');

        return redirect()->route('posts.index');
    }
}
