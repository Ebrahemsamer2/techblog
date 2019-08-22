<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    use SoftDeletes;

    const ADMIN = '1';
    const USER = '0';

    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
        'photo_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function categories() {
        return $this->hasMany('App\Category');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
    public function replies() {
        return $this->hasMany('App\Reply');
    }

    public function isAdmin() {
        return $this->admin == 1;
    }

    public function isVerified() {
        return $this->email_verified_at !== null;
    }
}
