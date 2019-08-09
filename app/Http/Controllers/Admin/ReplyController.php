<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use App\Comment;
use App\Reply;

class ReplyController extends Controller
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
