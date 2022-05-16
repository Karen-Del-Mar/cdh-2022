<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_user');

            $table->string('company', 100)->nullable();
            $table->string('location', 100)->nullable();
            $table->enum('sector', ['Restaurante', 'Bar','Comercio', 'Entretenimiento', 'Atención al cliente', 'Marketing','Tecnología','Otro'])->nullable(); // Sector? a que se dedica la empresa
            $table->string('description', 8000); // sirve en caso de que seleccione 'otro' en sector y para profundizar sobre que hace la empresa
            
            $table->float('score')->default(0);
            $table->boolean('hidden')->default(false);

            $table->foreign('id_user')->references('id')->on('users')
            ->onDelete('restrict')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('employers');
    }
}
