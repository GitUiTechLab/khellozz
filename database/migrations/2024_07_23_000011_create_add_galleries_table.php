<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('add_galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
