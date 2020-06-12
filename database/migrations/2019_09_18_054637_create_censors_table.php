<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCensorsTable extends Migration
{
    public function up()
    {
        Schema::create('censors', function (Blueprint $table) {
            $table->increments('censor_id');
            $table->string('censor_name');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('censors');
    }
}
