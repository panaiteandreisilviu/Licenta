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

            // Post Count
            $posts = \App\Post::latest()->where('published', '=' , '1');
            $postCount = $posts->count();

            // Archives
            $archives = \App\Post::archives();

            // User archives
            $userArchives = \App\Post::archivesByUser();

            $view->with(['archives' => $archives, 'userArchives' => $userArchives, 'postCount' => $postCount]);
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
