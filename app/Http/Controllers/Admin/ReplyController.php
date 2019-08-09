<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Comment;
use App\Reply;

class AdminCommentRepliesController extends Controller
{

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $inputs = $request->all();
        $inputs['user_id'] = $user_id;
        Reply::create($inputs);
        return redirect('/admin/comments');
    }

}
