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

// ------ POSTS
Route::get('/', "PostController@index")->name("frontpage");
Route::get('/posts', "PostController@index");
Route::get('/post/{post}', "PostController@show");

// ------ PROFILE

//Route::get('/profile', "ProfileController@index");
Route::get('/profile/{user}', "ProfileController@show");
Route::post('/profile/{user}', "ProfileController@update");

// ------ PAGES

Route::get('/pages/{page}', "PageController@index");
Route::get('admin/pages', "PageController@indexAdmin");
Route::get('/admin/pages/create', "PageController@create");
Route::post('/admin/pages/store', "PageController@store");

Route::get('/admin/pages/menu', "PageController@menu");


// ----------------- ADMIN -----------------------

Route::get('/admin', "AdminController@index")->name("adminpage");

// ------ POSTS

Route::get('/admin/posts', "PostController@indexAdmin");
Route::get('/admin/posts/create', "PostController@create");
Route::post('/admin/posts/store', "PostController@store");
Route::get('/admin/posts/{post}/edit', "PostController@edit");
Route::put('/admin/posts/{post}', "PostController@update");

// ------ USERS

Route::get('/admin/users', "UsersController@index");
Route::get('/admin/users/{user}/edit', "UsersController@edit");
Route::put('/admin/users/{user}', "UsersController@update");

// ------ ROLES

Route::resource('/admin/roles', "RolesController");

// ------ PERMISSIONS

Route::resource('/admin/permissions', "PermissionsController");

// ------ ROLE -> PERMISSIONS

Route::get('admin/role_permission/{role}', "RolePermission@index");
Route::post('admin/role_permission', "RolePermission@edit");

// ------ MAIL

Route::get('/admin/mail', "MailController@index");


// ----------------- LOGIN / REGISTRATION -----------------------

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');


// ----------------- FACEBOOK LOGIN -----------------------

Route::get('/facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
{
    if(!session_id()) {
        session_start();
    }

    // Obtain an access token.
    try {
        $token = $fb->getAccessTokenFromRedirect();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Access token will be null if the user denied the request
    // or if someone just hit this URL outside of the OAuth flow.
    if (! $token) {
        // Get the redirect helper
        $helper = $fb->getRedirectLoginHelper();
        $_SESSION['FBRLH_state']=$_GET['state'];

        if (! $helper->getError()) {
            abort(403, 'Unauthorized action.');
        }

        // User denied the request
        dd(
            $helper->getError(),
            $helper->getErrorCode(),
            $helper->getErrorReason(),
            $helper->getErrorDescription()
        );
    }

    if (! $token->isLongLived()) {
        // OAuth 2.0 client handler
        $oauth_client = $fb->getOAuth2Client();

        // Extend the access token.
        try {
            $token = $oauth_client->getLongLivedAccessToken($token);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
    }

    $fb->setDefaultAccessToken($token);

    // Save for later
    Session::put('fb_user_access_token', (string) $token);

    // Get basic info on the user from Facebook.
    try {
        $response = $fb->get('/me?fields=id,name,email');
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
    $facebook_user = $response->getGraphUser();

    // Create the user if it does not exist or update the existing entry.
    // This will only work if you've added the SyncableGraphNodeTrait to your User model.
    $user = App\User::createOrUpdateGraphNode($facebook_user);

    // Log the user into Laravel
    Auth::login($user);

    return redirect('/')->with('message', 'Successfully logged in with Facebook');
});

// ----------------- TEST -----------------------

// Endpoint that is redirected to after an authentication attempt
Route::get('/facebook/test', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
{
    $fb = \App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');

//    try {
//        $response = $fb->get('/709511829232448/posts');
//    } catch(\Facebook\Exceptions\FacebookSDKException $e) {
//        dd($e->getMessage());
//    }

    try {
        $response = $fb->get('/1857730571156494?fields=access_token', "");
    } catch(\Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }


    dd($response);

});