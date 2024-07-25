<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddPlayersTable extends Migration
{
    public function up()
    {
        Schema::table('add_players', function (Blueprint $table) {
            $table->unsignedBigInteger('registration_id')->nullable();
            $table->foreign('registration_id', 'registration_fk_9966915')->references('id')->on('add_registrations');
            $table->unsignedBigInteger('event_title_id')->nullable();
            $table->foreign('event_title_id', 'event_title_fk_9966916')->references('id')->on('add_events');
        });
    }
}
