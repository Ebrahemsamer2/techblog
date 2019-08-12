<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;

use App\Comment;
use App\Reply;

class ReplyController extends Controller
{

	public function index() {
		$comments = Comment::orderBy('id', 'desc')->paginate(10);
		return view('admin.replies.index', compact('comments'));
	}

    public function create($id) {
        $comment = Comment::findOrFail($id);
        return view('admin.replies.create', compact('comment'));
    }

    public function edit($id) {
        $reply = Reply::findOrFail($id);
        return view('admin.replies.edit', compact('reply')); 
    }

    public function update(Request $request, $id) {

        $reply = Reply::findOrFail($id);

        $rules = [
            'comment_id' => 'required|integer',
            'the_reply' => 'required|min:10|max:1000',
        ];

        $this->validate($request, $rules);

        if($request->has('the_reply')) {
            $reply->the_reply = $request->the_reply;
        }

        if($reply->isClean()) {
            // nothing happen here
            Session::flash('nothing_changed', 'Nothing Changed');
        }else {
            $reply->save();
            Session::flash('reply_updated', 'Reply has Updated');
            return redirect('/admin/comments/' . $reply->comment->id);
        }
    }

    public function store(Request $request)
    {
        $user_id = 1; // temp

        $rules = [
            'comment_id' => 'required|integer',
            'the_reply' => 'required',
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $data['user_id'] = $user_id;

        Reply::create($data);
        Session::flash('reply_created', 'Reply has Created');
        return redirect('/admin/comments/' . $request->comment_id);
    }

    public function destroy($id) {
        $reply = Reply::findOrFail($id);
        $reply->delete();
        Session::flash('reply_deleted', 'Reply has been Deleted');
        return redirect('/admin/comments/' . $reply->comment->id);
    }
}
