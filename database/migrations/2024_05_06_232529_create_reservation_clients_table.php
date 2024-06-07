<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationClientsTable extends Migration
{
    public function up()
    {
        Schema::create('reservation_clients', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('address');
            $table->string('city');
            $table->unsignedBigInteger('reservation_id');
            $table->timestamps();

            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_clients');
    }
}
