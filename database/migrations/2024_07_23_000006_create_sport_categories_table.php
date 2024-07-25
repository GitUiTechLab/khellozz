<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('sport_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sport_name');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
