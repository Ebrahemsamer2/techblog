<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class AdminMediaController extends Controller
{

    public function index() {
    	$photos = Photo::paginate(10);
    	return view('admin.photo.index', compact('photos'));
    }

 //    public function create() {
 //    	return view('admin.photo.create');
 //    }

 //    public function store(Request $request) {
 //    	$inputs = $request->all();
 //    	if($file = $request->file('path')) {
 //    		$name = time() . $file->getClientOriginalName();

 //    		$file->move('images', $name);

	// 		Photo::create([ 'path' => $name]);

	// 		return redirect('/admin/photos');
 //    	}
	// }

	public function destroy(Photo $photo) {

		if(file_exists(public_path() . $photo->filename)){
			unlink(public_path() . $photo->filename);
		}
		$photo->delete();
		return redirect('/admin/photos');
	}
}
