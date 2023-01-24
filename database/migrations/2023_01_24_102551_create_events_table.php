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
            $table->uuid('id')->primary();
            // $table->foreignId('user_id')->constrained();
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('event_name');
            $table->string('event_desc');
            $table->string('event_location');
            $table->string('event_artist');
            $table->string('event_image');
            $table->date('event_date');
            $table->time('event_start_time');
            $table->time('event_end_time');
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
