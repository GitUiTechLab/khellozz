<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('add_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('review');
            $table->string('reviewer_name');
            $table->longText('address');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
