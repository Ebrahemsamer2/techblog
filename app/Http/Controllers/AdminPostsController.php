<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Http\Requests\EditPostsRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Category;
use App\Post;
use App\Photo;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $user = Auth::user();
        $inputs = $request->all();

        if($file = $request->file('photo_id')) {  
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $inputs['photo_id'] = $photo->id;
        }
        $user->posts()->create($inputs);

        Session::flash('Created_post', 'Post has been created');
        return redirect('/admin/posts');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostsRequest $request, $id)
    {
        
        $inputs = $request->all();

        if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create([ 'path' => $name]);

            $inputs['photo_id'] = $photo->id;

        }

        Auth::user()->posts()->where('id','=',$id)->first()->update($inputs);
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if(file_exists(public_path() . $post->photo->path)){
            unlink(public_path() . $post->photo->path);
        }
        $post->delete();
        Session::flash('deleted_post', 'Post has been deleted');
        return redirect('/admin/posts');
    }
}
