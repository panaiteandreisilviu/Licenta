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
}
