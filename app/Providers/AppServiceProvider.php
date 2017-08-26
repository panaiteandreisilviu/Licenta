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
        view()->composer('layouts.top-nav.post_sidebar', function($view){

            // Post Count
            $posts = \App\Post::latest()->where('published', '=' , '1');
            $postCount = $posts->count();

            // Archives
            $archives = \App\Post::archives();

            // User archives
            $userArchives = \App\Post::archivesByUser();

            // Tags
            $tags = \App\Tag::all();
            $tagsCount = 0;
            foreach ($tags as $tagsByPost) {
                $tagsCount += $tagsByPost->posts->count();
            }

            $view->with(compact('archives', 'userArchives', 'postCount', 'tags', 'tagsCount'));
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
