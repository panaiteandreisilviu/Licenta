<?php

use App\Menu;
use App\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = new Page();
        $page->slug = 'pagina-principala';
        $page->title = 'Bine ati venit pe site-ul Departamentului';
        $page->menu_title = 'Pagina principala';
        $page->menu_icon = 'fa-home';
        $page->content_url = 'public/pages/' . $page->slug;
        $page->layout = 'admin-layout';
        $page->user_id = '1';
        $page->save();

        $page = new Page();
        $page->slug = 'istoric';
        $page->title = 'Istoric Departament AII';
        $page->menu_title = 'Istoric';
        $page->menu_icon = 'fa-history';
        $page->content_url = 'public/pages/' . $page->slug;
        $page->layout = 'admin-layout';
        $page->user_id = '1';
        $page->save();

        $page = new Page();
        $page->slug = 'administrativ';
        $page->title = 'Organizare administrativa - Departament AII';
        $page->menu_title = 'Administrativ';
        $page->menu_icon = 'fa-sitemap';
        $page->content_url = 'public/pages/' . $page->slug;
        $page->layout = 'admin-layout';
        $page->user_id = '1';
        $page->save();

        $page = new Page();
        $page->slug = 'cadre-didactice';
        $page->title = 'Cadre didactice UPB';
        $page->menu_title = 'Cadre didactice';
        $page->menu_icon = 'fa-users';
        $page->content_url = 'public/pages/' . $page->slug;
        $page->layout = 'admin-layout';
        $page->user_id = '1';
        $page->save();

        $page = new Page();
        $page->slug = 'studii-licenta';
        $page->title = 'Studii de licenta';
        $page->menu_title = 'Studii de licenta';
        $page->menu_icon = 'fa-university';
        $page->content_url = 'public/pages/' . $page->slug;
        $page->layout = 'admin-layout';
        $page->user_id = '1';
        $page->save();

        $page = new Page();
        $page->slug = 'studii-master';
        $page->title = 'Studii de master';
        $page->menu_title = 'Studii de master';
        $page->menu_icon = 'fa-graduation-cap';
        $page->content_url = 'public/pages/' . $page->slug;
        $page->layout = 'admin-layout';
        $page->user_id = '1';
        $page->save();

        $page = new Page();
        $page->slug = 'an-universitar';
        $page->title = 'Anul universitar 2016-2017';
        $page->menu_title = 'Anul universitar';
        $page->menu_icon = 'fa-calendar';
        $page->content_url = 'public/pages/' . $page->slug;
        $page->layout = 'admin-layout';
        $page->user_id = '1';
        $page->save();

        $page = new Page();
        $page->slug = 'linkuri-utile';
        $page->title = 'Linkuri utile';
        $page->menu_title = 'Linkuri utile';
        $page->menu_icon = 'fa-link';
        $page->content_url = 'public/pages/' . $page->slug;
        $page->layout = 'admin-layout';
        $page->user_id = '1';
        $page->save();

        $page = new Page();
        $page->slug = 'documente-utile';
        $page->title = 'Documente utile';
        $page->menu_title = 'Documente utile';
        $page->menu_icon = 'fa-files-o';
        $page->content_url = 'public/pages/' . $page->slug;
        $page->layout = 'admin-layout';
        $page->user_id = '1';
        $page->save();

        $page = new Page();
        $page->slug = 'evenimente';
        $page->title = 'Evenimente';
        $page->menu_title = 'Evenimente';
        $page->menu_icon = 'fa-calendar-o';
        $page->content_url = 'public/pages/' . $page->slug;
        $page->layout = 'admin-layout';
        $page->user_id = '1';
        $page->save();

        $page = new Page();
        $page->slug = 'stagii-studenti';
        $page->title = 'Stagii pentru studenti';
        $page->menu_title = 'Stagii pentru studenti';
        $page->menu_icon = 'fa-briefcase';
        $page->content_url = 'public/pages/' . $page->slug;
        $page->layout = 'admin-layout';
        $page->user_id = '1';
        $page->save();

        $page = new Page();
        $page->slug = 'contact';
        $page->title = 'Contact';
        $page->menu_title = 'Contact';
        $page->menu_icon = 'fa-phone';
        $page->content_url = 'public/pages/' . $page->slug;
        $page->layout = 'admin-layout';
        $page->user_id = '1';
        $page->save();

        Menu::truncate();
        foreach (Page::all() as $page) {
            $menu = new Menu();
            $menu->menu_title = 'MAIN NAVIGATION';
            $menu->page_id = $page->id;
            $menu->save();
        }

    }
}
