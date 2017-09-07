<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class Post extends Model
{
    use Notifiable;

    protected $fillable = ['title', 'body', 'user_id', 'image_path', 'published', 'published_at', 'published_twitter', 'published_facebook']; // CE SE POATE SALVA CU POST::create([]);
    //protected $guarded = ['id']; // CE NU SE POATE SALVA CU POST::create([]);

    public function user(){
        return $this->belongsTo(User::class)->first();
    }

    public function comments()
    {
        // RETURNEAZA COMENTARIILE PENTRU POSTAREA CURENTA !!
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function addComment($body){
        $this->comments()->create(compact('body'));
    }

    public static function archives(){

        return static::selectRaw('extract(year from created_at) AS year, extract(month from created_at) AS month, count(*) AS no_posts')
            ->where('published', '=' , '1')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) DESC')
            ->get()
            ->toArray();
    }

    public static function archivesByUser(){

        return static::selectRaw('user_id, count(*) AS no_posts')
            ->where('published', '=' , '1')
            ->groupBy('user_id')
            ->orderByRaw('min(created_at) DESC')
            ->get()
            ->toArray();
    }

    /*-------------------------------------------------*/

    public function facebook_like_count()
    {

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        try {
            $response = $fb->get("/{$this->facebook_post_id}/likes", Session::get('fb_page_access_token'));
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        $likes = $response->getGraphEdge()->asArray();
        return $likes ? count($likes) : 0;
    }

    /*-------------------------------------------------*/

    public function facebook_comment_count()
    {

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        try {
            $response = $fb->get("/{$this->facebook_post_id}/comments", Session::get('fb_page_access_token'));
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        $comments = $response->getGraphEdge()->asArray();
        return $comments ? count($comments) : 0;
    }
    /*-------------------------------------------------*/

    public function facebook_comments()
    {

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        try {
            $response = $fb->get("/{$this->facebook_post_id}/comments", Session::get('fb_page_access_token'));
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        $comments = $response->getGraphEdge()->asArray();
        if(count($comments > 3)){
            $comments = array_slice($comments, -3, 3, true);
        }
        return $comments;
    }

    /*-------------------------------------------------*/

    public function facebook_share_count()
    {

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        try {
            $response = $fb->get("/{$this->facebook_post_id}/sharedposts", Session::get('fb_page_access_token'));
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        $shares = $response->getGraphEdge()->asArray();
        return $shares ? count($shares) : 0;
    }

    /*-------------------------------------------------*/

    public function facebook_post_stories_count()
    {

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        try {
            $response = $fb->get("/{$this->facebook_post_id}/insights/post_stories", Session::get('fb_page_access_token'));
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        $stories = $response->getGraphEdge()->asArray();
        return isset($stories[0]['values']['0']['value']) ? $stories[0]['values']['0']['value'] : 0;
    }

    /*-------------------------------------------------*/

    public function facebook_post_storytellers_count()
    {

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        try {
            $response = $fb->get("/{$this->facebook_post_id}/insights/post_storytellers", Session::get('fb_page_access_token'));
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        $stories = $response->getGraphEdge()->asArray();
        return isset($stories[0]['values']['0']['value']) ? $stories[0]['values']['0']['value'] : 0;
    }

    /*-------------------------------------------------*/


    public function like_on_facebook()
    {

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        try {
            $response = $fb->post("/{$this->facebook_post_id}/likes", [], Session::get('fb_page_access_token'));
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
    }

    public function comment_on_facebook($comment)
    {

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        try {
            $response = $fb->post("/{$this->facebook_post_id}/comments", ['message' => $comment], Session::get('fb_page_access_token'));
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
    }

    /*-------------------------------------------------*/

    /**
     * Get published_at as date
     *
     * @param  string  $value
     * @return string
     */
    public function getPublishedAtAttribute($value)
    {
        if($value){
            $value = Carbon::parse($value);
            return $value;
        } else {
            return null;
        }
    }
}
