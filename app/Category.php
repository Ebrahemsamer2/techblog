<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{

	use Sluggable;

	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = ['user_id', 'name'];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function posts() {
		return $this->hasMany('App\Post');
	}

}
