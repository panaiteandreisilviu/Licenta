<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        $fb = \App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');
        $facebook_login_url = $fb->getLoginUrl(['email']);

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

        return redirect()->route("login");
    }
}
