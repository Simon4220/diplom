<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    public function show($postSlug)
    {
        $post = Post::where('slug', $postSlug)->first();
        $post->views += 1;
        $post->update();
        return view('posts.show', compact('post'));
    }
}
