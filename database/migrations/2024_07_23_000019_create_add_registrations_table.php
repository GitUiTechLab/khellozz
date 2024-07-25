<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('add_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('school_name');
            $table->string('age');
            $table->string('gender');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
