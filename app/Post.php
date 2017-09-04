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
