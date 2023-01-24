<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myBooks', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('organizer_id');
            $table->foreign('organizer_id')->references('id')->on('users');
            $table->string('customer_name');
            $table->string('customer_age');
            $table->string('customer_id_card');
            $table->string('event_name');
            $table->string('event_address');
            $table->string('event_artist');
            $table->string('event_image');
            $table->string('ticket_category');
            $table->integer('price');
            $table->integer('quantity');
            $table->date('event_date');
            $table->time('event_end_time');
            $table->datetime('event_booking_time');
            $table->string('event_booking_code');
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
        Schema::dropIfExists('myBooks');
    }
}
