<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'photo_id','category_id'];

    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $directory = "/admin/images/";


    public function photo() {
    	return $this->belongsTo('App\Photo');
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function category() {
    	return $this->belongsTo('App\Category');
    }
    
    public function comments() {
        return $this->hasMany('App\Comment');
    }


    // Accessors
    
    public function getHomeContentAttribute() {
        return Str::limit($this->content, 200); 
    } 

    public function getPostContentAttribute() {
        return $this->content;
    }
    public function getAdminContentAttribute() {
        return Str::limit($this->content, 50);
    }
}
