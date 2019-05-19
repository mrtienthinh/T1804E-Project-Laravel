<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =Post::with('comments')->published()->orderBy('published_at','desc')->paginate(3);
        $tags = Tag::all();
        $categories = Category::with('posts' )->get();
        $postPopular = Post::orderBy('view_count','desc')->take(3)->get();
        return view('front.index',compact('tags', 'categories','postPopular'))->with('posts', $posts );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->published()->first();
        if ($post == null){
            return redirect('/post')->with('message', "Not found!");
        }
        $post->increment('view_count');
        $post->save();
        $tags = Tag::all();
        $categories = Category::with('posts')->get();
        $postPopular = Post::orderBy('view_count','desc')->take(3)->get();
        $post = Post::where('slug', $slug)->first();
        return view('front.show',compact('tags', 'categories','postPopular'))->with('post', $post );
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        return abort(404);
    }

    public function searchPost()
    {
        $tags = Tag::all();
        $categories = Category::with('posts')->get();
        $postPopular = Post::orderBy('view_count','desc')->take(3)->get();
        $keysearch = Input::get('postBody');
        $posts = Post::where('body','like','%'.$keysearch.'%')->published()->orderBy('published_at','desc')->paginate(3);
//        return dd($posts->first());
        if ($posts->first() == null){
            return redirect('/post')->with('message', "The post not found!");
        }
        return view('front.index',compact('tags', 'categories','postPopular'))->with('posts', $posts );
    }
}
