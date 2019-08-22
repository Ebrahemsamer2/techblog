<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
    	return view('contact');
    }

    public function mail(Request $request) {

        $data = [
    		'name' => $request->name,
    		'msg' =>  $request->message,
    	];

    	Mail::send('emails.contact', $data, function($message) {
    		$message->to('soltan_algaram41@yahoo.com', 'Ebrahem Samer')->subject("User Contact");
    	});

        Session::flash('email-sent', 'Your Message has been sent');
        return redirect('/contact#contact');
    }
}
