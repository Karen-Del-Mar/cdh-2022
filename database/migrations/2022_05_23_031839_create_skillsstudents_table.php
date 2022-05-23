<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skillsstudents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_student');
            $table->foreignId('id_skill');

            $table->foreign('id_student')->references('id')->on('students')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_skill')->references('id')->on('skills')
            ->onDelete('cascade')
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
        Schema::dropIfExists('skillsstudents');
    }
}
