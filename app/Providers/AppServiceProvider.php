<?php

namespace App\Providers;

use App\Mail;
use Illuminate\Support\Facades\Auth;
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

        // --------------------------------

        view()->composer('layouts.top-nav.notifications', function($view){

            if(Auth::check()){
                $unseenMails = Mail::where('user_id', Auth::user()->id)
                    ->where('unseen', 1)
                    ->orderBy('sent_on', 'DESC')
                    ->get();
            } else{
                $unseenMails = null;
            }

            $view->with(compact('unseenMails'));
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
