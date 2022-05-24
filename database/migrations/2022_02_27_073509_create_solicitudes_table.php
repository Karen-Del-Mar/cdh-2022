<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('document', 11);
            $table->string('email');
            $table->string('name', 50);
            $table->string('company', 80);
            $table->string('location', 50);
            $table->string('phone', 10);
            $table->enum('sector', ['Restaurante', 'Bar','Comercio', 'Entretenimiento', 'Atención al cliente', 'Marketing','Tecnología', 'Otro'])->nullable();
            $table->string('description', 8000);

            // Estado: 1 => solicitud pendiente
            //         2 => solicitud aceptada
            //         3 => solicitud rechazada
            $table->tinyInteger('state')->default(1);
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
        Schema::dropIfExists('solicitudes');
    }
}
