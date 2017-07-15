<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Notifications\PostPublished;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $posts = \App\Post::all()->sortByDesc("created_at");
        $posts = \App\Post::latest();

        if($month = request('month')){
            $posts->whereMonth('created_at', $month);
        }
        if($year = request('year')){
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->get();

        $fb = \App::make('SammyK\LaravelFacebookSdk\LaravelFacebookSdk');
//        try {
//            $response = $fb->get('/709511829232448/posts');
//        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
//            dd($e->getMessage());
//        }

        try {
            $response = $fb->get('/709511829232448?fields=access_token');
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }


        dd($response);

        return view('frontpage.posts.index', compact('posts'));
    }

    public function indexAdmin() {


        request()->user()->authorizeRoles(['admin']);


        $posts = \App\Post::all()->sortByDesc("created_at");
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // REDIRECTS TO SAME PAGE IF VALIDATION FAILS !!
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png'
        ]);

        $imageHashName = "";
        if(request('image')) {
            $imageHashName = request()->file('image')->hashName();
            Storage::put(
                'public/post_images/' . $imageHashName,
                file_get_contents(request()->file('image')->getRealPath())
            );
        }
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id(),
            'image_path' => $imageHashName,
        ]);

        $post = Post::orderBy('created_at', 'desc')->first();
        $post->notify(new PostPublished());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('frontpage.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
