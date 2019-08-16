<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Comment;

class CommentController extends Controller
{
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

        $comment = Comment::create($data);
        Session::flash('created_comment', 'Your Comment has been Created!');
        return redirect('/post/' . $comment->post->slug . '#comments');
    }
}
