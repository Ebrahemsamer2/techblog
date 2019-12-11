<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Photo;
use App\Post;

use Purifier;

class PostController extends Controller
{
    public function create_article() {
        return view('create_article');
    }

    public function store(Request $request)
    {

        $rules = [
            'title'     =>'required|min:10|max:100',
            'content'   =>'required|min:10|max:1000',
            'category_id'=>'required|integer',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['content'] =  Purifier::clean($request->content);
        $user_id = Auth::user()->id;

        if($request->has('photo_id')) {

            $file = $request->file('photo_id');  
            $file_name = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();

            $file_to_store = time() . $file_name;

            $file->move(public_path('/images/'), $file_to_store);
            $photo = Photo::create(['filename'=>$file_to_store]);
            $data['photo_id'] = $photo->id;
        }
        $data['user_id'] = $user_id;
        $data['published'] = 0;
        Post::create($data);

        Session::flash('created_post', 'Article has been created, Admin will review Your article and publish it.');
        return redirect('/create_article');
    }
}
