<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;

use App\Category;
use App\Post;
use App\Photo;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {   
        $categories = Category::pluck('name','id');
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $rules = [
            'title'     =>'required|min:10|max:100',
            'content'   =>'required|min:10|max:1000',
            // 'user_id'   =>'required|integer',
            'category_id'=>'required|integer',
        ];

        $this->validate($request, $rules);

        // $user = Auth::user();
        $data = $request->all();

        if($request->has('photo_id')) {

            $file = $request->file('photo_id');  
            $file_name = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();

            $file_to_store = time() . $file_name;

            $file->move(public_path('/images/'), $file_to_store);
            $photo = Photo::create(['filename'=>$file_to_store]);
            $data['photo_id'] = $photo->id;
        }
        $data['user_id'] = 1;
        Post::create($data);

        Session::flash('Created_post', 'Post has been created');
        return redirect('/admin/posts');
    }

    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        
        $rules = [
            'title' => 'required|min:10',
            'content' => 'required|max:1000',
            'category_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        if($request->has('title')) {
            $post->title = $request->title;
        }
        if($request->has('content')) {
            $post->content = $request->content;
        }
        if($request->has('category_id')) {
            $post->category_id = $request->category_id;
        }

        if($request->has('photo_id')) {

            $file = $request->file('photo_id');

            $file_name = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();

            $file_to_store = time() . $file->getClientOriginalName();

            $file->move(public_path('/images/'), $file_to_store);

            $photo = Photo::create([ 'filename' => $file_to_store]);

            $post->photo_id = $photo->id;

        }

        if($post->isClean()){
            Session::flash('nothing_changed', 'Nothing Changed in this post');
            return redirect('/admin/posts/' . $post->id . '/edit');
        }else {
            $post->save();
            Session::flash('updated_post', 'Post has been updated');
            return redirect('/admin/posts');
        }
        // Auth::user()->posts()->where('id','=',$id)->first()->update($inputs);
        // return redirect('/admin/posts');
    }

    public function show(Post $post) {
        return view('admin.posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        if(file_exists(public_path('/images/') . $post->photo->filename)){
            unlink(public_path('/images/') . $post->photo->filename);
        }
        Session::flash('deleted_post', 'Post has been deleted');
        return redirect('/admin/posts');
    }
}
