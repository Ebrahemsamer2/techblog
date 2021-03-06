<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Photo;

class UserController extends Controller
{
    public function edit_profile($id) {
        $user = User::findOrFail($id);
        return view('edit_profile', compact('user'));
    }

    public function update_profile(Request $request, $id) {
        
        $user = User::findOrFail($id);
        
        if($request->has('name')) {
            $user->name = $request->name;
        }

        if($request->has('email')) {
            $user->email = $request->email;
        }

        if($request->has('photo_id')) {

            $file = $request->file('photo_id');

            $file_name = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();

            $file_to_store = time() . $file->getClientOriginalName();

            $file->move(public_path('/images/'), $file_to_store);

            $photo = Photo::create([ 'filename' => $file_to_store]);

            $user->photo_id = $photo->id;

        }

        if($request->has('password')) {

            $password = $request->password;
            $confirmpassword = $request->confirm_password;
            if(strlen($password) !== 0) {
                if($password === $confirmpassword) {
                    $new_password = password_hash($password, PASSWORD_DEFAULT);
                    $user->password = $new_password;
                }
            }
        }

        if($user->isClean()) {
            Session::flash('nothing-changed', 'Nothing Changed');
            return redirect('/user/'.$id.'/profile/edit#edit-form');
        }else {
            $user->save();
            Session::flash('updated_user', 'User has been updated.');
            return redirect('/user/'.$id.'/profile/edit#edit-form');
        }
    }

    public function user_profile($id) {

        $user = User::findOrFail($id);

        $logged_user = Auth::user();

        if($user){
            if($user->email === $logged_user->email) { 
                return view('profile', compact('user'));
            }else {
                return abort(404);
            }
        }else {
            return abort(404);
        }
    }

    public function verify($token) {   
        $user = User::where('verification_token', '=' , $token)->get()->first();
        $user->verified = 1;
        $user->verification_token = null;

        $user->save();

        return redirect('/');
    }

}
