<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id');
            $table->integer('user_id');
            $table->integer('driver_id');
            $table->string('statut');
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('pickup_point');
            $table->string('drop_location');
            $table->string('itinerary_desc');
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
        Schema::dropIfExists('trip_requests');
    }
}
