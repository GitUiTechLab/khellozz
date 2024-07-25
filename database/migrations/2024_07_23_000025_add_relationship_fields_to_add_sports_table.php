<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddSportsTable extends Migration
{
    public function up()
    {
        Schema::table('add_sports', function (Blueprint $table) {
            $table->unsignedBigInteger('sport_name_id')->nullable();
            $table->foreign('sport_name_id', 'sport_name_fk_9966367')->references('id')->on('sport_categories');
        });
    }
}
