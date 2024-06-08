<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('nombre');
            $table->string('dni');
            $table->string('direccion')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('telefono');
            $table->string('correo');
            $table->integer('num_huespedes');
            $table->integer('num_ninos')->nullable();
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
