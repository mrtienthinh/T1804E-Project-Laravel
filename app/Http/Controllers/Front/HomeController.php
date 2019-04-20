<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return abort(404);
    }

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
        $tags = Tag::all();
        $categories = Category::with('posts')->get();
        $postPopular = Post::orderBy('view_count','desc')->take(3)->get();
        $posts = User::where('slug', $slug)->first()->posts()->published()->paginate(3);
        return view('front.index',compact('tags', 'categories','postPopular'))->with('posts', $posts );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
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
    public function update(Request $request, Post $post)
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

    public function about(){
        $tags = Tag::all();
        $categories = Category::with('posts')->get();
        $postPopular = Post::orderBy('view_count','desc')->take(3)->get();

        return view('front.about',compact('tags', 'categories','postPopular'));

    }
    public function contact(){
        $tags = Tag::all();
        $categories = Category::with('posts')->get();
        $postPopular = Post::orderBy('view_count','desc')->take(3)->get();

        return view('front.contact',compact('tags', 'categories','postPopular'));
    }
}
