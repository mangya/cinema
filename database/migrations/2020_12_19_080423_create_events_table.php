<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->bigInteger('venue_id');
            $table->string('name');
            $table->string('category');
            $table->string('code')->unique();
            $table->smallInteger('price')->unsigned();
            $table->smallInteger('seats_available')->unsigned();
            $table->dateTime('start_date');
            $table->text('description');
            $table->tinyInteger('status')->comment('1 => active, 0 => inactive');
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
        Schema::dropIfExists('events');
    }
}
