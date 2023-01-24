<?php

use Carbon\Carbon;
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
            $table->uuid('id')->primary();
            // $table->foreignId('user_id')->constrained();
            // $table->foreignId('ticket_id')->constrained();
            $table->string('user_id', 64);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('ticket_id', 64);
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->integer('quantity');
            // $table->timestamps()->default(Carbon::now());
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
