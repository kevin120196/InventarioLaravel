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
            $table->integer('codigo_factura');
            $table->date('fecha_factura');
            //$table->enum('tipos_factura',['Credito','Contado']);
            $table->enum('estado_factura',['Pagada','Pendiente','Anulada','Devolución']);
            //claves foraneas
            //$table->integer('estado_id')->unsigned();
            $table->integer('tipos_factura_id')->unsigned();
            $table->integer('clientes_id')->unsigned();
            $table->integer('descuentos_clientes_id')->unsigned();
            $table->integer('vendedores_id')->unsigned();
            //Referencias claves foraneas
            //$table->foreign('estado_id')->references('id')->on('estados_facturas')->onDelete('cascade');
            $table->foreign('tipos_factura_id')->references('id')->on('tipos_facturas')->onDelete('cascade');
            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('descuentos_clientes_id')->references('id')->on('descuentos_clientes')->onDelete('cascade');
            $table->foreign('vendedores_id')->references('id')->on('vendedores')->onDelete('cascade');
            //
            $table->double('total');
            $table->timestamps();
        });

        Schema::create('factura_producto_venta', function (Blueprint $table) {
            $table->increments('id');
            $table->double('cantidad');
            $table->double('precio');
            $table->double('subtotal');
            $table->double('iva');
            //claves foraneas
            $table->integer('ventas_id')->unsigned();
            //$table->integer('facturas_ventas_estados_id')->unsigned();
            //$table->integer('facturas_ventas_tipos_id')->unsigned();
            //$table->integer('facturas_ventas_clientes_id')->unsigned();
            //$table->integer('facturas_ventas_descuentos_id')->unsigned();
            //$table->integer('facturas_ventas_vendedores_id')->unsigned();
            //$table->integer('productos_producto_id')->unsigned();
            $table->integer('productos_id')->unsigned();
            //$table->integer('productos_categoria_id')->unsigned();
            //$table->integer('productos_proveedores_id')->unsigned();
            //referncias claves foraneas
            $table->foreign('ventas_id')->references('id')->on('facturas_ventas')->onDelete('cascade');
            //$table->foreign('facturas_ventas_estados_id')->references('id')->on('facturas_ventas')->onDelete('cascade');
            //$table->foreign('facturas_ventas_tipos_id')->references('id')->on('facturas_ventas')->onDelete('cascade');
            //$table->foreign('facturas_ventas_clientes_id')->references('id')->on('facturas_ventas')->onDelete('cascade');
            //$table->foreign('facturas_ventas_descuentos_id')->references('id')->on('facturas_ventas')->onDelete('cascade');
            //$table->foreign('facturas_ventas_vendedores_id')->references('id')->on('facturas_ventas')->onDelete('cascade');
            //$table->foreign('productos_producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('productos_id')->references('id')->on('productos')->onDelete('cascade');
            //$table->foreign('productos_categoria_id')->references('id')->on('productos')->onDelete('cascade');
            //$table->foreign('productos_proveedores_id')->references('id')->on('productos')->onDelete('cascade');
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
