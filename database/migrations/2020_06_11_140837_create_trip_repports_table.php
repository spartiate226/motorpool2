<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripRepportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_repports', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('trip_request_id');
            $table->Integer('vehicle_id');
            $table->integer('deppart_km');
            $table->integer('arriv_km');
            $table->date('repport_date');
            $table->time('repport_time');
            $table->string('description');
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
        Schema::dropIfExists('trip_repports');
    }
}
