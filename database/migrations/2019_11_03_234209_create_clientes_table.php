<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('direccion',100);
            $table->string('cedula',20)->unique();
            $table->string('numero_telefono',15);
            $table->string('correo_electronico',100)->unique();
            //clave foranea
            $table->integer('descuento_id')->unsigned();
            //referencia clave foraneas
            $table->foreign('descuento_id')->references('id')->on('descuentos_clientes')->onDelete('cascade'); 
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
        Schema::dropIfExists('clientes');
    }
}
