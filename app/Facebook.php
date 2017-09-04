<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class Facebook extends Model
{
    public static function getUserPageAccounts()
    {
        $fb_user_access_token = Session::get('fb_user_access_token');

        if(!$fb_user_access_token) {
            return array();
        }

        $fb = \App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        try {
            $response = $fb->get('/me/accounts', $fb_user_access_token);
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        $accounts = array();
        $accountsEdge = $response->getGraphEdge();

        foreach ($accountsEdge as $accountNode) {
            $accounts[$accountNode->getField('id')] = $accountNode->asArray();
        }
        return $accounts;

    }

    public static function createPost(Post $post)
    {
        $fb = \App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');
        try {
            $response = $fb->post('/' .  Session::get('fb_page_app_id') .
                '/photos', ['caption' => $post->title . "\n\n<br>" . $post->body , 'url' => 'https://c1.staticflickr.com/1/85/209708058_b5a5fb07a6_z.jpg'] , Session::get('fb_page_access_token'));
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }

        $post_id = $response->getGraphNode()->getField('id');
        $post->facebook_post_id = $post_id;
        $post->save();
    }
}
