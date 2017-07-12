<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.top-nav.sidebar', function($view){
            $posts = \App\Post::latest();
            $postCount = $posts->count();
            $view->with(['archives' => \App\Post::archives(), 'postCount' => $postCount]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
