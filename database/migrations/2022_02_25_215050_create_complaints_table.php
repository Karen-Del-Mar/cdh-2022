<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_student');
            $table->foreignId('id_vacancy');
            $table->text('message')->nullable();

            $table->foreign('id_student')->references('id')->on('students')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_vacancy')->references('id')->on('vacancies')
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
        Schema::dropIfExists('complaints');
    }
}
