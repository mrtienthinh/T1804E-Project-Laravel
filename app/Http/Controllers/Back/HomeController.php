<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userRole = Auth::user()->role()->first()->name;
        if ($userRole == 'isAdmin') {
            $users = User::with('role')->get();
            return view('back.users.index')->with('users', $users);
        } else{
            return abort(403);
        }
    }

    public function create()
    {
        $userRole = Auth::user()->role()->first()->name;
        if ($userRole == 'isAdmin') {
            return view('back.users.create');
        } else{
            return abort(403);
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
        $userRole = Auth::user()->role()->first()->name;
        if ($userRole == 'isAdmin') {
            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'repassword' => 'required',
                'slug' => 'required',
                'bio'=>'required',
                'role_id' => 'required'
            ]);
            if ($request->input('password') != $request->input('repassword')){
                return back()->with('error-message', 'Password input not match!');
            }
            if (User::where('email', $request->email)->first() != null){
                return back()->with('error-message', 'This email has been used!');
            }
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->slug = $request->input('slug');
            $user->bio = $request->input('bio');
            $user->role_id = $request->input('role_id');
            $user->password = bcrypt($request->input('password'));

            $user->save();

            return redirect('admin/user')->with('success', 'Add new category successfully!');
        } else{
            return abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userRole = Auth::user()->role()->first()->name;
        if ($userRole == 'isAdmin') {
            return view('back.users.edit')->with('user', User::find($id));
        } else{
            return abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $userRole = Auth::user()->role()->first()->name;
        if ($userRole == 'isAdmin') {
            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'repassword' => 'required',
                'slug' => 'required',
                'bio'=>'required',
                'role_id' => 'required'
            ]);
            if ($request->input('password') != $request->input('repassword')){
                return back()->with('error-message', 'Password input not match!');
            }
            if (User::where('email', $request->email)->first() == null){
                return back()->with('error-message', 'You can not change email!');
            }
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->slug = $request->input('slug');
            $user->bio = $request->input('bio');
            $user->role_id = $request->input('role_id');
            $user->password = bcrypt($request->input('password'));

            $user->save();

            return redirect('admin/user')->with('success', 'Update the user successfully!');
        } else{
            return abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->id == Auth::user()->id){
            return redirect('admin/user')->with('message', 'You can not delete your account');
        }


        foreach ($user->posts()->get() as $post){
            $post->user_id = null;
            $post->save();
        }

        foreach ($user->comments()->get()  as $comment){
            $comment->user_id = null;
            $comment->save();
        }


        $user->delete();
        return redirect('admin/user')->with('success', 'You delete the account successfully!');
        
    }
}
