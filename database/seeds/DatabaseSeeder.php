<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Category;
use App\Photo;
use App\Comment;
use App\Reply;
use App\Post;

class DatabaseSeeder extends Seeder
{


    public function run()
    {

    	DB::statement('set FOREIGN_KEY_CHECKS = 0');

    	User::truncate();
    	Post::truncate();
    	Photo::truncate();
    	Comment::truncate();
    	Reply::truncate();
    	Category::truncate();

    	$user_count = 20;
    	$photo_count = 100;
    	$category_count = 50;
    	$post_count = 50;
    	$comment_count = 100;
    	$reply_count = 30;

    	factory(Photo::class, $photo_count)->create();
    	factory(User::class, $user_count)->create();
    	factory(Category::class, $category_count)->create();
        factory(Post::class, $post_count)->create();
    	factory(Comment::class, $comment_count)->create();
    	factory(Reply::class, $reply_count)->create();

    }
}
