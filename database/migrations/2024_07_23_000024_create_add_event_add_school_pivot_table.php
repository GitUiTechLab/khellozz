<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddEventAddSchoolPivotTable extends Migration
{
    public function up()
    {
        Schema::create('add_event_add_school', function (Blueprint $table) {
            $table->unsignedBigInteger('add_event_id');
            $table->foreign('add_event_id', 'add_event_id_fk_9966922')->references('id')->on('add_events')->onDelete('cascade');
            $table->unsignedBigInteger('add_school_id');
            $table->foreign('add_school_id', 'add_school_id_fk_9966922')->references('id')->on('add_schools')->onDelete('cascade');
        });
    }
}
