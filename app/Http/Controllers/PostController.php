<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;

class PostController extends Controller
{

    public function show($slug) {
    	$post = Post::where('slug', '=', $slug)->get()->first();
    	$categories = Category::all();
    	return view('post', compact('post', 'categories'));
    }

}
