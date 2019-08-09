<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class AdminMediaController extends Controller
{

    public function index() {
    	$photos = Photo::all();
    	return view('admin.media.index', compact('photos'));
    }

    public function create() {
    	return view('admin.media.create');
    }

    public function store(Request $request) {
    	$inputs = $request->all();
    	if($file = $request->file('path')) {
    		$name = time() . $file->getClientOriginalName();

    		$file->move('images', $name);

			Photo::create([ 'path' => $name]);

			return redirect('/admin/media');
    	}
	}

	public function destroy($id) {

		$photo = Photo::findOrFail($id);
		if(file_exists(public_path() . $photo['path'])){
			unlink(public_path() . $photo['path']);
		}
		$photo->delete();
		return redirect('/admin/media');
	}
}
