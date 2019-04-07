<?php

namespace App\Providers;

use App\Category;
use App\Http\View\Composers\NavComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
//    /**
//     * Register services.
//     *
//     * @return void
//     */
//    public function register()
//    {
//        //
//    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('front.users.index', function ($view){

            $categories = Category::with(['posts' => function($query) {
                $query->published();
            }])->orderBy('title', 'asc')->get();
            $view->with('categories', $categories );


            $popularPosts = Post::published()->popular()->take(3)->get();
            $view->with('popularPosts', $popularPosts);
        });
    }
}
