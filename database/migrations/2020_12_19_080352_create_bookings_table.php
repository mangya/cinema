<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->bigInteger('event_id');
            $table->string('code',10)->unique();
            $table->smallInteger('seats')->unsigned();
            $table->smallInteger('amount')->unsigned();
            $table->dateTime('booking_date');
            $table->tinyInteger('status')->comment('1 => active, 0 => inactive, 3 => cancelled');
            $table->dateTime('cancell_date')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
