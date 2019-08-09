<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use App\User;
use App\Photo;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);
        return view('admin.users.index', compact('users'));
    }

    // public function create()
    // {
    //     return view('admin.users.create');
    // }

    // public function store(Request $request)
    // {
    //     $rules = [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'name' => 'required',
    //         'name' => 'required',
    //         'name' => 'required',
    //     ];

    //     $inputs = $request->all();

    //     if($file = $request->file('path')) {    
    //         $name = time() . $file->getClientOriginalName();
    //         $file->move('images', $name);
    //         $photo = Photo::create(['path'=>$name]);
    //         $inputs['photo_id'] = $photo->id;
    //     }else {
    //         $inputs['photo_id'] = 1;
    //     }

    //         $inputs['password'] = password_hash($request->password, PASSWORD_DEFAULT);
    //         User::create($inputs);   

    //         Session::flash('created_user', 'User has been created.');
    //         return redirect('/admin/users');
    // }

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
            $user->save()
            Session::flash('updated_user', 'User has been updated.');
            return redirect('/admin/users');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        unlink(public_path() . $user->photo->path);
        Session::flash('deleted_user', 'User has been deleted.');
        return redirect('/admin/users');
    }
}
