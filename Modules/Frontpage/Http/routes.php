<?php

Route::group(['middleware' => 'web', 'prefix' => 'frontpage', 'namespace' => 'Modules\Frontpage\Http\Controllers'], function()
{
    Route::get('/', 'FrontpageController@index');
});
