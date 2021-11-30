<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create() {

        return view('posts.create');
    }

    public function store(){

        $data = request()->validate([
            // 'another' => '',
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);


        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1200, 1200);
        $image->save(public_path("/storage/{$imagePath}"));

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }


    public function show(\App\Models\Post $post) {

        // dd($post);
        return view('posts.show', [
            'post' => $post,
        ]);
    }


    public function index() {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->latest()->get();
        // dd($posts);

        return view('posts.index', [
            'posts' => $posts,
        ]);

    }
}
