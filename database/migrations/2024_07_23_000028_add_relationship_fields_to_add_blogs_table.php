<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddBlogsTable extends Migration
{
    public function up()
    {
        Schema::table('add_blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('sport_name_id')->nullable();
            $table->foreign('sport_name_id', 'sport_name_fk_9966564')->references('id')->on('sport_categories');
        });
    }
}
