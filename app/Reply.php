<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    
	protected $fillable = [
		'user_id',
		'comment_id',
		'the_reply'];



	public function comment() {
		return $this->belongsTo('App\Comment');
	}

}
