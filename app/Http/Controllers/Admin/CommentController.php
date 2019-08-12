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

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(20);
        return view('admin.comments.index', compact('posts'));
    }

    public function create()
    {
        $posts = Post::pluck('title', 'id');
        return view('admin.comments.create', compact('posts'));
    }

    public function store(Request $request)
    {
        // $user_id = Auth::user()->id;
        $user_id = 1;

        $rules = [
            'the_comment' => 'required',
            'post_id' => 'required|integer'
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $data['user_id'] = $user_id;

        Comment::create($data);
        Session::flash('created_comment', 'Your Comment has been Created!');
        return redirect('/admin/comments');
    }

    public function edit(Comment $comment)
    {
        $posts = Post::pluck('title', 'id');
        return view('admin.comments.edit', compact('posts','comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $rules = [
            'the_comment' => 'required',
            'post_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        if($request->has('the_comment')) {
            $comment->the_comment = $request->the_comment;
        }
        if($request->has('post_id')) {
            $comment->post_id = $request->post_id;
        }

        if($comment->isClean()) {
            // nothing changed
            Session::flash('nothing_changed', 'Nothing Changed');
        }else {
            $comment->save();
            Session::flash('updated_comment', 'Comment has been updated');
            return redirect('/admin/comments');
        }
    }

    public function show(Comment $comment) {
        return view('admin.comments.show', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        Session::flash('deleted_comment', 'Comment has been deleted');
        return redirect('/admin/comments');
    }

}
