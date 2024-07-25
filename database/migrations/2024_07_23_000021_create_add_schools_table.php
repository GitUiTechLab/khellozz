<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddSchoolsTable extends Migration
{
    public function up()
    {
        Schema::create('add_schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('school_name');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
