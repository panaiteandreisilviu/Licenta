<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    protected $fillable = ['slug', 'title', 'content', 'content_url' , 'menu_title', 'menu_icon', 'layout', 'user_id',]; // CE SE POATE SALVA CU Page::create([]);

    public function user() {
        return $this->belongsTo(User::class)->first();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function getMenuItems() {

        $pages = Page::all();
        $menus = new Collection();

        foreach ($pages as $index => $page) {

            $menuItem = new Menu();
            $menuItem->page_id = $page->id;
            $menuItem->menu_title = "";

            $menus->add($menuItem);
        }

        return $menus;
    }

    public function getContent(){
        return Storage::get('/public/pages/' . $this->slug);
    }

}
