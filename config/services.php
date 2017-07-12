<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'twitter' => [
        'consumer_key'    => getenv('TWITTER_CONSUMER_KEY'),
        'consumer_secret' => getenv('TWITTER_CONSUMER_SECRET'),
        'access_token'    => getenv('TWITTER_ACCESS_TOKEN'),
        'access_secret'   => getenv('TWITTER_ACCESS_SECRET')
    ],

    'facebook_poster' => [
        'app_id'    => getenv('FACEBOOK_APP_ID'),
        'app_secret' => getenv('FACEBOOK_APP_SECRET'),
        'access_token'    => getenv('FACEBOOK_ACCESS_TOKEN'),
    ]

];
