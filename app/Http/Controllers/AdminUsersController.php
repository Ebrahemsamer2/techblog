<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Photo;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $inputs = $request->all();

        if($file = $request->file('path')) {    
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $inputs['photo_id'] = $photo->id;
        }else {
            $inputs['photo_id'] = 1;
        }

            $inputs['password'] = password_hash($request->password, PASSWORD_DEFAULT);
            User::create($inputs);   

            Session::flash('created_user', 'User has been created.');
            return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $inputs = $request->all();
        if ($inputs['password'] == '') {
            $inputs = $request->except('password');
        }else {
            $inputs['password'] = password_hash($request->password, PASSWORD_DEFAULT);
        }

        if($file = $request->file('path')) {
            
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['path'=>$name]);

            $inputs['photo_id'] = $photo->id;
        }

        $user->update($inputs);
        Session::flash('updated_user', 'User has been updated.');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->photo_id != 1) {
            $user->delete();
            unlink(public_path() . $user->photo->path);
        }else {
            $user->delete();
        }
        Session::flash('deleted_user', 'User has been deleted.');

        return redirect('/admin/users');
    }
}
