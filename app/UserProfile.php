<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id', 'profile_picture_filename', 'education', 'position', 'location', 'skills', 'notes'
    ];

}
