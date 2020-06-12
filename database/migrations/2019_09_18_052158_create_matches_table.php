<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('match_id');
            $table->integer('user_id');
            $table->integer('game_id');
            $table->integer('match_type');
            $table->integer('censor');
            $table->integer('challenge_type')->comment = '0 - Open | 1 - User ';
            $table->integer('challenge_amount')->default(0);
            $table->integer('win_prize')->default(0);
            $table->time('time');
            $table->string('nickname');
            $table->string('uniq_id');
            $table->integer('winner_id');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
