<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $posts = Post::paginate(5);
        $categories = Category::all();
        return view('home', compact('posts', 'categories'));
    }

    public function category_posts($slug) {
        $category = Category::where('slug', '=', $slug)->get()->first();
        $posts = $category->posts;
        $categories = Category::all();
        return view('category_posts', compact('posts', 'categories'));
    }
}
