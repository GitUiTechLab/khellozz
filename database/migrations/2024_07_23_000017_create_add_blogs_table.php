<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('add_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->date('date');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
