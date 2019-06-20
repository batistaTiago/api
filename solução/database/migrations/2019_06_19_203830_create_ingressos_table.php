<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngressosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingressos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('preco');
            $table->string('zona');
            $table->string('cadeira');


            $table->bigInteger('tipo_ingresso_id')->unsigned();
            $table->bigInteger('evento_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('ingressos', function (Blueprint $table) {
            $table->foreign('tipo_ingresso_id')->references('id')->on('tipo_ingressos');
            $table->foreign('evento_id')->references('id')->on('eventos');

            $table->unique(array('evento_id', 'zona', 'cadeira'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingressos');
    }
}
