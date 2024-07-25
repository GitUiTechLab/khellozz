<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddContestantsTable extends Migration
{
    public function up()
    {
        Schema::create('add_contestants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
