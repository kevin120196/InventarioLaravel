<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_factura');
         //   $table->enum('tipos_factura',['Credito','Contado']);
         //   $table->enum('estado_factura',['Cancelada','Pendiente']);
            //claves foraneas
            $table->integer('estado_id')->unsigned();
            $table->integer('tipos_factura_id')->unsigned();
            $table->integer('clientes_id')->unsigned();
            $table->integer('descuentos_clientes_id')->unsigned();
            $table->integer('vendedores_id')->unsigned();
            //Referencias claves foraneas
            $table->foreign('estado_id')->references('id')->on('estados_facturas')->onDelete('cascade');
            $table->foreign('tipos_factura_id')->references('id')->on('tipos_facturas')->onDelete('cascade');
            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('descuentos_clientes_id')->references('id')->on('descuentos_clientes')->onDelete('cascade');
            $table->foreign('vendedores_id')->references('id')->on('vendedores')->onDelete('cascade');
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
        Schema::dropIfExists('facturas_ventas');
    }
}
