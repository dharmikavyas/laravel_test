<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchTypesTable extends Migration
{
    
    public function up()
    {
        Schema::create('match_types', function (Blueprint $table) {
            $table->increments('match_type_id');
            $table->string('match_type_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('match_types');
    }
}
