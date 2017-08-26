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

    // ---------------------------------------------

    public static function addPost(Post $post){

        if(!$fb_user_access_token) {
            return array();
        }

        $fb = \App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

        try {
            $response = $fb->post('/' .  Session::get('fb_page_app_id') . '/feed', ['message' => 'Test post from sdk 3.... '] , Session::get('fb_page_access_token'));
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }


        echo '<pre>' . print_r($response->getGraphNode(),1) . '<pre>';

        $post_id = $response->getGraphNode()->getField('id');

        dd($post_id);
    }

    // ---------------------------------------------

}
