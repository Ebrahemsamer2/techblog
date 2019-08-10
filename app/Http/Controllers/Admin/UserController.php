<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
use App\Photo;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {   

        // rules here

        $rules = [
            'admin' => 'integer'
        ];

        $this->validate($request, $rules);

        if($request->has('admin')) {
            $user->admin = $request->admin;
        }

        if($user->isClean()) {
            Session::flash('nothing-changed', 'Nothing Changed');
        }else {
            $user->save();
            Session::flash('updated_user', 'User has been updated.');
            return redirect('/admin/users');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        if(file_exists(public_path() . $user->photo->filename)) {
            unlink(public_path() . $user->photo->filename);
        }
        Session::flash('deleted_user', 'User has been deleted.');
        return redirect('/admin/users');
    }
}
