<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('verification_token')->default(User::generateVerificationToken());
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('admin')->default(User::USER);
            $table->string('verified')->default(0);
            $table->rememberToken();
            $table->timestamps();

            $table->softDeletes();
            $table->bigInteger('photo_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
