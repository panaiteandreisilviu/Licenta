<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function index(Page $page)
    {
        return view('frontpage.pages.index', compact('page'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        $pages = Page::all()->sortByDesc("created_at");
        return view('admin.pages.index', compact('pages'));
    }

    public function menu()
    {
        //return view('admin.pages.menu', compact('pages'));
        return view('admin.pages.menu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // REDIRECTS TO SAME PAGE IF VALIDATION FAILS !!
        $this->validate(request(), [
            'slug' => 'required',
            'title' => 'required',
            'content' => 'required',
//            'layout' => 'required',
        ]);

        Page::create([
            'slug' => request('slug'),
            'title' => request('title'),
            'content' => request('content'),
            'layout' => 'admin-layout',
            'user_id' => auth()->id(),
        ]);


        $request->session()->flash('success_message', 'Page successfully saved!');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
