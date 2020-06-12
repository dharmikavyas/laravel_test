<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email',50)->unique();
            /* if Create a api enable this field  */
            $table->string('device_token')->nullable();
            $table->string('device_type')->nullable();
            $table->string('password');
            $table->integer('country_id')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('balance')->nullable();
            $table->string('status')->default(1);
            $table->string('image')->default('placeholder.jpg');
            $table->integer('win')->default(0);
            $table->integer('loss')->default(0);
            $table->string('customer_id')->nullable();
            $table->string('customer_card')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
