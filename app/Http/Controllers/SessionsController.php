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
        return view('frontpage.sessions.create');
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
