<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['TWITTER_CONSUMER_KEY', 'TWITTER_CONSUMER_SECRET', 'TWITTER_ACCESS_TOKEN', 'TWITTER_ACCESS_SECRET', 'FACEBOOK_APP_ID', 'FACEBOOK_APP_SECRET', 'FACEBOOK_ACCESS_TOKEN'];
}
