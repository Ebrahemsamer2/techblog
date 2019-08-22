<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;

use App\User;
use App\Category;
use App\Photo;
use App\Comment;
use App\Reply;
use App\Post;


// Photo factory

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'filename' => $faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg']),
    ];
});


// User factory

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'admin' => $faker->randomElement([User::ADMIN, User::USER]),
        'photo_id' => Photo::all()->random()->id,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


// Category factory

$factory->define(Category::class, function (Faker $faker) {

    $name = $faker->word;
    $slug = strtolower($name);

    return [
        'name' => $name,
        'slug' => $slug,
        'user_id' => User::all()->random()->id,
    ];
});


// Post factory

$factory->define(Post::class, function (Faker $faker) {
    
    $title = $faker->paragraph; 
    $slug = str_slug($title, '-');

    return [
        'user_id' => User::all()->random()->id,
        'title' => $title,
        'content' => $faker->paragraph(10),
        'slug' => $slug,
        'photo_id' => Photo::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'published' => $faker->randomElement([0,1,1,1,1,1]),
    ];
});


// Comment factory

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => Post::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'the_comment' => $faker->paragraph,
    ];
});


// Reply factory

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'comment_id' => Comment::all()->random()->id,
        'the_reply' => $faker->paragraph,
    ];
});