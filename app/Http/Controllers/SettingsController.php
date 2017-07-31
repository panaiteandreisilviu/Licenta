<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all()->first();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'TWITTER_CONSUMER_KEY' => 'required',
            'TWITTER_CONSUMER_SECRET' => 'required',
            'TWITTER_ACCESS_TOKEN' => 'required',
            'TWITTER_ACCESS_SECRET' => 'required',
            'FACEBOOK_APP_ID' => 'required',
            'FACEBOOK_APP_SECRET' => 'required',
            'FACEBOOK_ACCESS_TOKEN' => 'required',
        ]);

        Settings::truncate();

        Settings::create([
            'TWITTER_CONSUMER_KEY' => request('TWITTER_CONSUMER_KEY'),
            'TWITTER_CONSUMER_SECRET' => request('TWITTER_CONSUMER_SECRET'),
            'TWITTER_ACCESS_TOKEN' => request('TWITTER_ACCESS_TOKEN'),
            'TWITTER_ACCESS_SECRET' => request('TWITTER_ACCESS_SECRET'),
            'FACEBOOK_APP_ID' => request('FACEBOOK_APP_ID'),
            'FACEBOOK_APP_SECRET' => request('FACEBOOK_APP_SECRET'),
            'FACEBOOK_ACCESS_TOKEN' => request('FACEBOOK_ACCESS_TOKEN'),
        ]);

        $request->session()->flash('success_message', 'Settings successfully saved!');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
