<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['slug', 'title', 'content', 'layout', 'user_id',]; // CE SE POATE SALVA CU Page::create([]);

    public function user(){
        return $this->belongsTo(User::class)->first();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
