<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Category;
use App\User;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {	
    	$posts = Post::orderBy('id', 'desc')->paginate(10);
        $hottest_posts  = Post::withCount('comments')
        ->orderBy('comments_count', 'desc')->paginate(5);

        $hottest_categories  = Category::withCount('posts')
        ->orderBy('posts_count', 'desc')->paginate(10);
    	return view('home', compact('posts', 'hottest_posts', 'hottest_categories'));
    }

     public function post($slug) {
    	$post = Post::where('slug', '=', $slug)->get()->first();

        $hottest_posts  = Post::withCount('comments')
        ->orderBy('comments_count', 'desc')->paginate(5);
        
        $hottest_categories  = Category::withCount('posts')
        ->orderBy('posts_count', 'desc')->paginate(10);

    	return view('post', compact('post', 'categories','hottest_posts', 'hottest_categories'));
    }

    public function category_posts($slug) {
    	$category = Category::where('slug', '=' , $slug)->get()->first();
    	$posts = $category->posts;

        $hottest_posts  = Post::withCount('comments')
        ->orderBy('comments_count', 'desc')->paginate(5);

        $hottest_categories  = Category::withCount('posts')
        ->orderBy('posts_count', 'desc')->paginate(10);
        
    	return view('category_posts', compact('posts', 'hottest_posts', 'hottest_categories'));
    }

    public function author_posts($name) {
        $author_name = User::where('name', '=' , $name)->get()->first();
        $posts = $author_name->posts;

        $hottest_posts  = Post::withCount('comments')
        ->orderBy('comments_count', 'desc')->paginate(5);

        $hottest_categories  = Category::withCount('posts')
        ->orderBy('posts_count', 'desc')->paginate(10);
        
        return view('author_posts', compact('posts', 'hottest_posts', 'hottest_categories'));
    }


    public function user_profile($name) {
        $logged_user = Auth::user();
        $user = User::where('name', '=' , $name)->get()->first();
        if($user){
            if($user->email === $logged_user->email) {  
                return view('profile', compact('user'));
            }else {
                return abort(404);
            }
        }else {
            return abort(404);
        }
    }

    public function create_article() {
        return view('create_article');
    }
}
