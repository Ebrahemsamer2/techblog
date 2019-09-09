<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Comment;
use App\Reply;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $rules = [];
        if($request->has('the_comment')) {
            $rules = [
                'the_comment' => 'required',
                'post_id' => 'required|integer',
            ];
        }
        if($request->has('the_reply')) {
            $rules = [
                'comment_id' => 'required|integer',
                'the_reply' => 'required',
            ];
        }

        $this->validate($request, $rules);

        $data = $request->all();

        $data['user_id'] = $user_id;

        $comment = '';
        $reply = '';

        if($request->has('the_comment')) {
            $comment = Comment::create($data);
        }
        if($request->has('the_reply')) {
            $reply = Reply::create($data);
        }
        $request->has('the_comment') ? Session::flash('created_comment', 'Your Comment has been Created!') : Session::flash('created_reply', 'Your Reply has been Created!');
        if($comment){
            return redirect('/post/' . $comment->post->slug . '#comments');
        }
        if($reply){
            return redirect('/post/' . $reply->comment->post->slug . '#comments');
        }


    }
}
