<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_factura');
            $table->enum('tipos_factura',['Credito','Contado']);
            $table->enum('estado_factura',['Cancelada','Pendiente']);
            //claves foraneas
            //$table->integer('estado_id')->unsigned();
            //$table->integer('tipos_factura_id')->unsigned();
            $table->integer('clientes_id')->unsigned();
            $table->integer('descuentos_clientes_id')->unsigned();
            $table->integer('vendedores_id')->unsigned();
            //Referencias claves foraneas
            //$table->foreign('estado_id')->references('id')->on('estados_facturas')->onDelete('cascade');
            //$table->foreign('tipos_factura_id')->references('id')->on('tipos_facturas')->onDelete('cascade');
            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('descuentos_clientes_id')->references('id')->on('descuentos_clientes')->onDelete('cascade');
            $table->foreign('vendedores_id')->references('id')->on('vendedores')->onDelete('cascade');
            //
            $table->timestamps();
        });

               Schema::create('detalle_factura', function (Blueprint $table){
            $table->increments('id');
            $table->date('fecha');
            $table->double('cantidad');
            $table->double('precio');
            $table->double('total');
            //claves foraneas
            $table->integer('facturas_id')->unsigned();
            //$table->integer('facturas_estados_facturas_id')->unsigned();
            //$table->integer('facturas_tipos_facturas_id')->unsigned();
            $table->integer('facturas_clientes_id')->unsigned();
            $table->integer('facturas_descuentos_clientes_id')->unsigned();
            $table->integer('facturas_vendedores_id')->unsigned();
            $table->integer('productos_id_productos')->unsigned();
            $table->integer('productos_marcas_id')->unsigned();
            $table->integer('productos_categorias_productos_id')->unsigned();
            $table->integer('productos_proveedores_id')->unsigned();
            //referncias claves foraneas
            $table->foreign('facturas_id')->references('id')->on('facturas')->onDelete('cascade');
            //$table->foreign('facturas_estados_facturas_id')->on('id')->references('facturas')->onDelete('cascade');
            //$table->foreign('facturas_tipos_facturas_id')->on('id')->references('facturas')->onDelete('cascade');
            $table->foreign('facturas_clientes_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('facturas_descuentos_clientes_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('facturas_vendedores_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('productos_id_productos')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('productos_marcas_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('productos_categorias_productos_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('productos_proveedores_id')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('facturas');
    }
}
