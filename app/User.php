<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN = '1';
    const USER = '0';

    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
        'verification_token',
        'photo_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function generateVerificationToken() {
        return Str::random(40);
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }

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

}
