<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddPlayersTable extends Migration
{
    public function up()
    {
        Schema::create('add_players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('class');
            $table->string('phone');
            $table->string('email');
            $table->integer('age');
            $table->string('father_mother_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
