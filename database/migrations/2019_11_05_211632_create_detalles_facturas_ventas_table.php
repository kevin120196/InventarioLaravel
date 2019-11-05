<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesFacturasVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_facturas_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->double('cantidad');
            $table->double('precio');
            $table->double('total');
            //claves foraneas
            $table->integer('facturas_ventas_id')->unsigned();
            $table->integer('facturas_ventas_estados_facturas_id')->unsigned();
            $table->integer('facturas_ventas_tipos_facturas_id')->unsigned();
            $table->integer('facturas_ventas_clientes_id')->unsigned();
            $table->integer('facturas_ventas_descuentos_clientes_id')->unsigned();
            $table->integer('facturas_ventas_vendedores_id')->unsigned();
            $table->integer('productos_id_productos')->unsigned();
            $table->integer('productos_marcas_id')->unsigned();
            $table->integer('productos_categorias_productos_id')->unsigned();
            $table->integer('productos_proveedores_id')->unsigned();
            //referncias claves foraneas
            $table->foreign('facturas_ventas_id')->references('id')->on('facturas_ventas')->onDelete('cascade');
            $table->foreign('facturas_ventas_estados_facturas_id')->references('id')->on('facturas_ventas')->onDelete('cascade');
            $table->foreign('facturas_ventas_tipos_facturas_id')->references('id')->on('facturas_ventas')->onDelete('cascade');
            $table->foreign('facturas_ventas_clientes_id')->references('id')->on('facturas_ventas')->onDelete('cascade');
            $table->foreign('facturas_ventas_descuentos_clientes_id')->references('id')->on('facturas_ventas')->onDelete('cascade');
            $table->foreign('facturas_ventas_vendedores_id')->references('id')->on('facturas_ventas')->onDelete('cascade');
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
        Schema::dropIfExists('detalles_factura_ventas');
    }
}
