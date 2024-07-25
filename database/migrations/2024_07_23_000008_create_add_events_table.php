<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddEventsTable extends Migration
{
    public function up()
    {
        Schema::create('add_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('date');
            $table->longText('address');
            $table->string('eventstart');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
