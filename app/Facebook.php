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

        $accountsEdge = $response->getGraphEdge();
        /*foreach ($response->getGraphEdge() as $node) {
            echo '<pre>' . print_r($node->getField('id'), 1) . '<pre>';
            echo '<pre>' . print_r($node->getField('name'), 1) . '<pre>';
            echo '<pre>' . print_r($node->getField('access_token'), 1) . '<pre>';

            Session::put('fb_page_app_id', $node->getField('id'));
            Session::put('fb_page_access_token', $node->getField('access_token'));
        }*/

        dd($accountsEdge);

        return $accountsEdge;
    }
}
