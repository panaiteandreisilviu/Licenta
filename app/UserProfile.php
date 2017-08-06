<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id', 'position', 'department', 'studies', 'address', 'birthplace', 'phone', 'website'
    ];
}
