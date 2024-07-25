<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContactFormsTable extends Migration
{
    public function up()
    {
        Schema::table('contact_forms', function (Blueprint $table) {
            $table->unsignedBigInteger('sport_name_id')->nullable();
            $table->foreign('sport_name_id', 'sport_name_fk_9968283')->references('id')->on('sport_categories');
        });
    }
}
