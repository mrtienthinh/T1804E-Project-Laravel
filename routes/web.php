<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Front\PostController@index');

Auth::routes();

//Back site
//Route::prefix('admin')->group(function () {
//    Route::resource('post','Back\PostController',['as' => 'admin']);
//    Route::get('search/post','Back\PostController@searchPost')->name('search.post');
//    Route::resource('category','Back\CategoryController');
//    Route::resource('user','Back\HomeController');
//    Route::resource('tag','Back\TagController');
//});
Route::group(['prefix'=>'admin','as'=>'admin.'], function () {
    Route::resource('post','Back\PostController');
    Route::get('search/post','Back\PostController@searchPost')->name('search.post');
    Route::resource('category','Back\CategoryController');
    Route::resource('user','Back\HomeController');
    Route::resource('tag','Back\TagController');
    Route::get('/','Back\HomeController@index')->name('home');
    Route::get('/home','Back\HomeController@index')->name('home');
    Route::get('/draft/posts','Back\PostController@draft')->name('draft.posts');
});
//Front site
Route::prefix('/')->group(function () {
    Route::resource('/post','Front\PostController');
    Route::resource('/category','Front\CategoryController');
    Route::resource('/author','Front\HomeController');
    Route::resource('/tag','Front\TagController');
    Route::resource('/comment','Front\CommentController');
    Route::get('/search/post','Front\PostController@searchPost')->name('search.post');
    Route::get('/about','Front\HomeController@about')->name('about');
    Route::get('/contact','Front\HomeController@contact')->name('contact');
});



