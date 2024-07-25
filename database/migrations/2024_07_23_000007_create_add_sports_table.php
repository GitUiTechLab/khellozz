<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddSportsTable extends Migration
{
    public function up()
    {
        Schema::create('add_sports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
