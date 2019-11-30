<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_compra');
            //$table->enum('tipos_factura',['Credito','Contado']);
            $table->enum('estado_factura',['Cancelada','Pendiente','Anulada']);            
            //claves foraneas
            $table->integer('tipo_factura_id')->unsigned();
            $table->integer('proveedores_id')->unsigned();
            //$table->integer('estados_facturas_id')->unsigned();
            //Referencias claves
            $table->foreign('tipo_factura_id')->references('id')->on('tipos_facturas')->onDelete('cascade');
            //$table->foreign('tipo_factura_id')->references('id')->on('tipos_facturas')->onDelete('cascade');
            //$table->foreign('estados_facturas_id')->references('id')->on('estados_facturas')->onDelete('cascade');
            $table->foreign('proveedores_id')->references('id')->on('proveedores')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas_compras');
    }
}
