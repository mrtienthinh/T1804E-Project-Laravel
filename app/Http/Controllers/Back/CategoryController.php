<?php

namespace App\Http\Controllers\Back;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        if ($userRole == 'isAdmin') {
            $categories = Category::all()->toArray();
            return view('back.categories.index')->with('categories', $categories);
        } else{
            return abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userRole = Auth::user()->role()->first()->name;
        if ($userRole == 'isAdmin') {
            return view('back.categories.create');
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
        if ($userRole == 'isAdmin' ) {
            $category = new Category();
            $category->title = $request->input('title');
            $category->slug = $request->input('slug');
            $category->save();
            return redirect('admin/category')->with('success', 'Add new category successfully!');
        } else{
            return abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userRole = Auth::user()->role()->first()->name;
        if ($userRole == 'isAdmin') {
            $category = Category::find($id);
            return view('back.categories.edit')->with('category', $category);
        } else{
            return abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userRole = Auth::user()->role()->first()->name;
        if ($userRole == 'isAdmin') {
            $category = Category::find($id);
            $category->title = $request->get('title');
            $category->slug = $request->get('slug');
            $category->save();
            return redirect('admin/category')->with('success', 'Update category successfully!');
        } else{
            return abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $userRole = Auth::user()->role()->first()->name;
        if ($userRole == 'isAdmin') {
            $category = Category::find($category->id);
            $category->delete();
            return redirect('admin/category')->with('success', 'Delete a category successfully!');
        } else{
            return abort(403);
        }
    }
}
