<?php

namespace App\Http\Controllers\Back;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRole = Auth::user()->role()->first()->name;
        if ($userRole == 'isAdmin' ) {
            $posts = Post::with('category', 'user')->latest()->paginate(10);
            return view('back.posts.index')->with("posts", $posts);
        } else {
            return redirect('front.posts.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'post_image'=>'image|max:1999'
        ]);

        if ($request->file('post_image') != null){
            // Get filename with extension
            $filenameWithExt = $request->file('post_image')->getClientOriginalName();
            // Get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get extension
            $extension = $request->file('post_image')->getClientOriginalExtension();
            // Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Uplaod image
            $path = $request->file('post_image')->storeAs('public/posts_image', $filenameToStore);
        } else{
            $filenameToStore = "Post_Image_1.jpg";
        }

        $post = new Post();
        $post->user_id = Auth::user()->first()->id;
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        if (Post::where('slug',$post->slug) != null){
            $post->slug = $request->input('slug').time();
        }
        $post->excerpt = $request->input('excerpt');
        $post->body = $request->input('body');
        $post->image = $filenameToStore;
        $post->published_at = $request->input('published_at');
        $post->category_id = $request->input('category_id');
        $post->save();

//        return dd($request);
        return back()->with('success', 'Add new post success!');;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->toArray();
        return view('back.posts.create')->with("categories", $categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('back.posts.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $categories = Category::all()->toArray();
        return view('back.posts.edit')->with('categories',$categories)->with('post', $post);
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
        $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'post_image'=>'image|max:1999'
        ]);
        if ($request->file('post_image')!= null){
            // Get filename with extension
            $filenameWithExt = $request->file('post_image')->getClientOriginalName();
            // Get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get extension
            $extension = $request->file('post_image')->getClientOriginalExtension();
            // Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Uplaod image
            $path= $request->file('post_image')->storeAs('public/posts_image', $filenameToStore);

            $post = Post::where('slug', $slug)->first();
            $post->user_id = Auth::user()->first()->id;
            $post->title = $request->input('title');
            $post->slug = $request->input('slug');
            if (Post::where('slug',$post->slug) != null){
                $post->slug = $request->input('slug').time();
            }
            $post->excerpt = $request->input('excerpt');
            $post->body = $request->input('body');
            $post->image = $filenameToStore;
            $post->published_at = $request->input('published_at');
            $post->category_id = $request->input('category_id');
        };

        $post->save();

//        return dd($request);
        return back()->with('success', 'Edit post success!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $posts = Post::where('slug',$slug);
        $posts->delete();
        return redirect('admin/post')->with(['success','Product has been  deleted'],
            ['posts',$posts = Post::with('category', 'user')->latest()->paginate(10)]);
    }

    public function searchPost()
    {
        $userRole = Auth::user()->role()->first()->name;
        if ($userRole == 'isAdmin' ) {
            $keysearch = Input::get('key');
            $posts = Post::where('body','like','%'.$keysearch.'%')->latest()->paginate(10);
            return view('back.posts.index')->with("posts", $posts);
        } else {
            return redirect('front.posts.index');
        }
    }

    public function draft(){
        $drafts = Post::whereNotNull('deleted_at')->get();
        return dd($drafts);
//        return view('back.posts.draft')->with('drafts',$drafts);
    }
}
