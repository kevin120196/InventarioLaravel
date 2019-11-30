<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesFacturasComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_facturas_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->double('cantidad');
            $table->double('precio');
            $table->double('total');
            //claves foraneas
            $table->integer('facturas_compras_id')->unsigned();
            //$table->integer('facturas_compras_estados_id')->unsigned();
            $table->integer('facturas_compras_tipos_id')->unsigned();
            $table->integer('facturas_compras_proveedor_id')->unsigned();
            $table->integer('productos_id_productos')->unsigned();
            $table->integer('productos_categoria_id')->unsigned();
           // $table->integer('productos_proveedores_id')->unsigned();
            //referncias claves foraneas
            $table->foreign('facturas_compras_id')->references('id')->on('facturas_compras')->onDelete('cascade');
            //$table->foreign('facturas_compras_estados_id')->references('id')->on('facturas_compras')->onDelete('cascade');
            $table->foreign('facturas_compras_tipos_id')->references('id')->on('facturas_compras')->onDelete('cascade');
            $table->foreign('facturas_compras_proveedor_id')->references('id')->on('facturas_compras')->onDelete('cascade');
            $table->foreign('productos_id_productos')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('productos_categoria_id')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('detalles_facturas_compras');
    }
}
