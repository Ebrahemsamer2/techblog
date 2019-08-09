<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['path'];
    
    protected $uploads = "/images/";



    public function getPathAttribute($photo) {
    	return $this->uploads . $photo;
    }
    
	// photos belongs to posts and users ( polymorphic relationship )
    // public function imageable() {
    // 	return $this->morphTo();
    // }

}
