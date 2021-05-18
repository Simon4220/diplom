<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {        
        $posts = Post::orderBy('views', 'desc')->limit(3)->get();
        $products = Product::orderBy('count_buying', 'desc')->limit(8)->get();
        return view('index', compact('posts', 'products'));
    }

    public function services()
    {
        return view('static.services');
    }

    public function secondServices()
    {
        return view('static.services2');
    }
}
