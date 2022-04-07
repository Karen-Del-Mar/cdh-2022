<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        /*
         * Cambiar hidden por state donde 
         * 0 sea habilitada => recibe postulaciones
         * 1 deshabilitada => no recibe postulaciones
         * 2 reportada => incumplimiento de reglas -> listar en administrador 
         * Añadir fecha limite para recibir postulaciones
         * Añadir campo de plazas para la vacante cuando el número de contratos sea igual a la plaza => deshabilitar
        */
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_employer');
           
            $table->text('job')->nullable();
            $table->text('profile')->nullable();

            $table->double('payment', 15, 2)->nullable()->default(000.000);
            $table->text('availability')->nullable();
            $table->boolean('hidden')->nullable()->default(false);
            $table->tinyInteger('state')->default(0);

            $table->timestamps();
            
            $table->foreign('id_employer')->references('id')->on('employers')
            ->onDelete('restrict')
            ->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}
