<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        $fb = \App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');
        $facebook_login_url = $fb->getLoginUrl(
            ['email','user_about_me', 'user_birthday', 'user_hometown', 'user_status','manage_pages', 'publish_pages', 'read_insights', 'publish_actions', 'pages_manage_cta']
        ); // se poate seta si in config

        return view('frontpage.sessions.create', compact('facebook_login_url'));
    }

    public function store()
    {
        //Attempt to authenticate the user
        //If so, sign them in.
        if( ! auth()->attempt(request(['email', 'password']))){
            return back()->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

        //Redirect to the home page.
        return redirect()->route("frontpage");
    }

    public function destroy()
    {
        auth()->logout();

        Session::forget('fb_page_app_id');
        Session::forget('fb_user_access_token');
        Session::forget('fb_page_access_token');

        return redirect()->route("login");
    }
}
