<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id']; // CE SE POATE SALVA CU POST::create([]);
    protected $guarded = ['id']; // CE NU SE POATE SALVA CU POST::create([]);

    public function user(){
        return $this->belongsTo(User::class)->first();
    }
}
