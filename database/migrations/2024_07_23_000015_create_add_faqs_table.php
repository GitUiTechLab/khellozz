<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('add_faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('question');
            $table->longText('answer');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
