<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function getPage(){

        return Page::find($this->page_id);
    }
}
