<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;

use App\Comment;
use App\Reply;
use App\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::pluck('title', 'id')->all();
        return view('admin.comments.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        if($request->has('the_comment')) {
            $inputs = $request->validate([
                'the_comment' => 'required|min:3',
                'post_id' => 'required|integer'
            ]);
            $inputs['user_id'] = $user_id;

            Comment::create($inputs);
            $request->session()->flash('comment_added', 'Your Comment has been Added!');
        } else {
            $inputs = $request->all();
            $inputs['user_id'] = $user_id;
            Reply::create($inputs);
            return redirect('/admin/comments');
        }

        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $posts = Post::pluck('title', 'id')->all();
        $comment = Comment::findOrFail($id);
        return view('admin.comments.edit', compact('posts','comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $inputs = $request->validate([
            'the_comment' => 'required|min:3',
            'post_id' => 'required|integer'
        ]);
        $inputs['user_id'] = Auth::user()->id;
        $comment->update($inputs);
        return redirect('/admin/comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect('/admin/comments');
    }

}
