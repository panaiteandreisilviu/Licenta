<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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

    /**
     * Post to Facebook
     * @return bool
     */
    public function publishFacebook(){

        $page_access_token = Session::get('page_access_token');
        $page_id = Session::get('fb_page_app_id');
        if(!$page_access_token || !$page_access_token) {
            return false;
        }

        $fb = App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        try {
            $response = $fb->post("/$page_id/feed", ['message' => $this->body] , $page_access_token);
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        $facebook_post_id = $response->getGraphNode()->getField('id');
        $this->facebook_post_id = $facebook_post_id;

        $this->save();

        return true;

    }

}
