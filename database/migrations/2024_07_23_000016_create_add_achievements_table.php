<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddAchievementsTable extends Migration
{
    public function up()
    {
        Schema::create('add_achievements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('player_name');
            $table->integer('age');
            $table->string('medal_type');
            $table->longText('description');
            $table->string('school_name');
            $table->string('class');
            $table->date('date');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
