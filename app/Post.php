<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable;

    protected $fillable = ['title', 'body', 'user_id', 'image_path']; // CE SE POATE SALVA CU POST::create([]);
    protected $guarded = ['id']; // CE NU SE POATE SALVA CU POST::create([]);

    public function user(){
        return $this->belongsTo(User::class)->first();
    }

    public function comments()
    {
        // RETURNEAZA COMENTARIILE PENTRU POSTAREA CURENTA !!
        return $this->hasMany(Comment::class);
    }

    public function addComment($body){
        $this->comments()->create(compact('body'));
    }

    public static function archives(){

        return static::selectRaw('extract(year from created_at) AS year, extract(month from created_at) AS month, count(*) AS no_posts')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) DESC')
            ->get()
            ->toArray();

    }

}
