<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Photo;

use App\Http\Controllers\Controller;

class PhotoController extends Controller
{

    public function index() {
    	$photos = Photo::orderBy('id', 'desc')->paginate(30);
    	return view('admin.photos.index', compact('photos'));
    }

	public function destroy(Photo $photo) {

		if(file_exists(public_path() . $photo->filename)){
			unlink(public_path() . $photo->filename);
		}
		$photo->delete();
		return redirect('/admin/photos');
	}
}
