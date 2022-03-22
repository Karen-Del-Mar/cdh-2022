<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_student');
            $table->foreignId('id_employer');
            //score emisor hidden
            $table->date('score_date');
            $table->tinyInteger('score')->default(5);

            $table->text('commentary')->nullable();

            $table->boolean('hidden')->nullable()->default(false);

            $table->foreign('id_student')->references('id')->on('students')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_employer')->references('id')->on('employers')
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
        Schema::dropIfExists('scores');
    }
}
