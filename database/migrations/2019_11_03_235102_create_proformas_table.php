<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProformasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proformas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_proforma');
            //Claves foraneas
            $table->integer('vendedores_id')->unsigned();
            $table->integer('clientes_id')->unsigned();
            $table->integer('descuentos_clientes_id')->unsigned();
            //referencias claves foraneas
            $table->foreign('vendedores_id')->references('id')->on('vendedores')->onDelete('cascade');
            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('descuentos_clientes_id')->references('id')->on('descuentos_clientes')->onDelete('cascade');
            //
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
        Schema::dropIfExists('proformas');
    }
}
