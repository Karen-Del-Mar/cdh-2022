<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');

            $table->date('final_date')->nullable()->default('2050-01-01');
            $table->text('job')->nullable();
            $table->bigInteger('payment')->unsigned();

            $table->foreignId('id_student')->default(0);
            $table->foreignId('id_employer')->default(0);

            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('id_student')->references('id')->on('students')
                ->onDelete('restrict')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('contracts');
    }
}
