<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Page;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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

    public function privacyPolicy(){
        return view('frontpage.pages.privacy_policy');
    }

    public function menu()
    {

        /*$menus = Menu::all();
        if(!$menus->count()) {
            $menus = Page::getMenuItems();
        }*/
        $menus = Page::getMenuItems();

        $menuItems = array();
        foreach ($menus as $index => $menu) {
            $menuItems[$menu->menu_title][] = Page::where('id', $menu->page_id)->first()->title;
        }

        return view('admin.pages.menu', compact('menuItems'));
    }

    public function storeMenus() {
        $menus = request('menuItems');

        Menu::truncate();
        foreach ($menus as $menuTitle => $menuItems) {

            foreach ($menuItems as $index => $menuItem) {
                $menu = new Menu();
                $menu->menu_title = $menuTitle;
                $menu->page_id = Page::where('title', $menuItem)->first()->id;
                $menu->save();
            }
        }

        return redirect('/admin/pages');
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
            'menu_title' => 'required',
//            'layout' => 'required',
        ]);


        Storage::put(
            'public/pages/' . request('slug'),
            request('content')
        );

        Page::create([
            'slug' => request('slug'),
            'title' => request('title'),
            'content_url' => 'public/pages/' . request('slug'),
            'menu_title' => request('menu_title'),
            'menu_icon' => request('menu_icon') ? request('menu_icon') : 'fa-page',
            'layout' => 'admin-layout',
            'user_id' => auth()->id(),
        ]);


        $request->session()->flash('success_message', 'Page successfully saved!');

        return redirect('/admin/pages');
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
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
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
        $this->validate(request(), [
            'slug' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $page->slug = request('slug');
        $page->title = request('title');
        $page->content_url = 'public/pages/' . request('slug');
        $page->menu_title = request('menu_title');
        $page->menu_icon = request('menu_icon') ? request('menu_icon') : 'fa-page';

        Storage::put(
            'public/pages/' . request('slug'),
            request('content')
        );

        $page->save();

        $request->session()->flash('success_message', 'Post successfully saved!');

        return redirect('/admin/pages/');
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
