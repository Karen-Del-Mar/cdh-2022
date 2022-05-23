<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
                
            $table->foreignId('id_user');

            $table->date('birthday')->nullable();
            $table->enum('gender', ['hombre', 'mujer','otro'])->nullable();
            $table->string('career', 80)->nullable();
            $table->tinyInteger('semester')->nullable()->default(null);
            $table->decimal('average', 5, 2)->nullable()->default(0.0);
            $table->string('eps', 50)->nullable();
            $table->string('blood_type', 4)->default('-1');
            $table->enum('job_skills', ['Atención al cliente','Habilidades comunicativas', 'Trabajo en equipo', 'Creatividad'])->nullable(); // ? deberia ser enum
            $table->enum('state', ['Postulado','No postulado','Contratado'])->default('No postulado');
            $table->text('office_tools', 7000)->nullable(); // cuales? deberia ser enum?
            $table->text('work_experience', 7000)->nullable(); // mostrar formato segun cv en canva
            $table->text('languages', 7000)->nullable();
            $table->text('basic_tools', 7000)->nullable();
            $table->float('score')->nullable()->default(0.0);
            $table->boolean('hidden')->default(false);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')
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
        Schema::dropIfExists('students');
    }
}
