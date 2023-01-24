<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreign('organizer_id')->references('id')->on('users');
            $table->foreign('ticketcategories_id')->references('id')->on('ticketcategories');
            $table->string('event_name');
            $table->string('event_address');
            $table->string('event_artist');
            $table->string('event_image');
            $table->date('event_date');
            $table->time('event_start_time');
            $table->date('event_end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Events');
    }
}