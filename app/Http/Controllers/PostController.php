<?php

namespace App\Http\Controllers;

use App\Facebook;
use App\Post;
use App\Tag;
use Carbon\Carbon;
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

        if($month = request('month')) {
            $posts->whereMonth('created_at', $month);
        }
        if($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }

        if($user_id = request('user')){
            $posts->where('user_id', '=' , $user_id);
        }

        $posts = $posts->get();

        if($tag_name = request('tag')) {
            $tag = Tag::where('name', $tag_name)->first();
            $posts = $tag->posts;
        }

        $publishedPostCount = Post::all()->where('published', '1');

        return view('frontpage.posts.index', compact('posts', 'publishedPostCount'));
    }

    public function indexAdmin() {

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
            'author' => 'required',
            'image' => 'image|mimes:jpeg,png,bmp'
        ]);

        // ------------------ STORE POST IMAGE ------------------
        $imageHashName = "";
        if(request('image')) {
            $imageHashName = request()->file('image')->hashName();
            Storage::put(
                'public/post_images/' . $imageHashName,
                file_get_contents(request()->file('image')->getRealPath())
            );
        }

        // ------------------ SAVE POST ------------------

        if(request('published') || request('published_twitter') || request('published_facebook')) {
            $published_at = new Carbon();
            $published_at = $published_at->format('Y-m-d H:i:s');
        } else {
            $published_at = null;
        }



        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => request('author') ? request('author') : auth()->id(),
            'published_at' => $published_at,
            'published' => request('published') ? 1 : 0,
            'published_twitter' => request('published_twitter') ? 1 : 0,
            'published_facebook' => request('published_facebook') ? 1 : 0,
            'image_path' => $imageHashName,
        ]);

        $post = Post::orderBy('created_at', 'desc')->first();

        // ------------------ PUBLISH POST FACEBOOK TWITTER ------------------

        if(request('published_twitter')){
            $post->notify(new PostPublished($post));
        }

        if(request('published_facebook') ){
            try{
                \App\Facebook::createPost($post);
            } catch(\Exception $e){
                $request->session()->flash('warning_message', 'Facebook: ' . $e->getMessage());
            }
        }

        // ------------------ ATTACH TAGS ------------------

        if(count(request('tags'))){
            foreach (request('tags') as $tag_id) {
                $post->tags()->attach($tag_id);
            }
        }

        $request->session()->flash('success_message', 'Post successfully saved!');

        return redirect('/admin/posts');
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
        return view('admin.posts.edit', compact('post'));
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

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
            'image' => 'image|mimes:jpeg,png,bmp'
        ]);

        // Delete last image (if exists)
        if($post->image_path){
            Storage::delete('public/post_images/' . $post->image_path);
        }

        //Upload new image
        $imageHashName = "";
        if(request('image')) {
            $imageHashName = request()->file('image')->hashName();
            Storage::put(
                'public/post_images/' . $imageHashName,
                file_get_contents(request()->file('image')->getRealPath())
            );
        }


        if((!$post->published && request('published')) || (!$post->published && request('published_twitter')) || (!$post->published && request('published_facebook')) ) {
            $published_at = new Carbon();
            $published_at = $published_at->format('Y-m-d H:i:s');
        } else {
            $published_at = $post->published_at;
        }

        // Publish post to twitter
        if(request('published_twitter') && $post->published_twitter == 0){
            $post->notify(new PostPublished());
        }

        // Publish post to twitter
        if(request('published_facebook') && $post->published_facebook == 0){
            try {
                \App\Facebook::createPost($post);
            } catch(\Exception $e) {
                $request->session()->flash('warning_message', 'Facebook: ' . $e->getMessage());
            }
        }

        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = request('author') ? request('author') : $post->user_id;
        $post->published = request('published') ? 1 : 0;
        $post->published_at = $published_at;
        $post->published_twitter = request('published_twitter') ? 1 : 0;
        $post->published_facebook = request('published_facebook') ? 1 : 0;
        $post->image_path = $imageHashName;


        $post->save();

        $request->session()->flash('success_message', 'Post successfully saved!');

        return redirect('/admin/posts');
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
