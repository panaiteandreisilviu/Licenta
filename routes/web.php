<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ----------------- FRONT PAGE -----------------------

Route::get('/', "PostController@index")->name("frontpage");
Route::get('/posts', "PostController@index");
Route::get('/post/{post}', "PostController@show");

//Route::get('/profile', "ProfileController@index");
Route::get('/profile/{user}', "ProfileController@show");
Route::post('/profile/{user}', "ProfileController@update");
// ----------------- ADMIN -----------------------

Route::get('/admin', "AdminController@index")->name("adminpage");

Route::get('/admin/posts', "PostController@indexAdmin");

Route::get('/admin/posts/create', "PostController@create");
Route::post('/admin/posts/store', "PostController@store");

Route::get('/admin/users', "UsersController@index");

Route::get('/admin/mail', "MailController@index");


// ----------------- LOGIN / REGISTRATION -----------------------

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');
