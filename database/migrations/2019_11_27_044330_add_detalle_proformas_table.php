<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetalleProformasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_proforma',function(Blueprint $table){
            $table->increments('id');
            $table->date('fecha_proforma');
            $table->integer('cantidad');
            $table->double('precio');
            $table->double('total');
            $table->text('detalles');
            //clave foranea
            $table->integer('proformas_id')->unsigned();
            $table->integer('proformas_vendedores_id')->unsigned();
            $table->integer('proformas_clientes_id')->unsigned();
            $table->integer('proformas_descuentos_clientes_id')->unsigned();
            $table->integer('productos_producto_id')->unsigned();
            $table->integer('productos_marcas_id')->unsigned();
            $table->integer('productos_categorias_id')->unsigned();
            $table->integer('productos_proveedores_id')->unsigned();
            //Referencia claves foraneas
            $table->foreign('proformas_id')->references('id')->on('proformas')->onDelete('cascade');
            $table->foreign('proformas_vendedores_id')->references('id')->on('proformas')->onDelete('cascade');
            $table->foreign('proformas_clientes_id')->references('id')->on('proformas')->onDelete('cascade');
            $table->foreign('proformas_descuentos_clientes_id')->references('id')->on('proformas')->onDelete('cascade');
            $table->foreign('productos_producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('productos_marcas_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('productos_categorias_id')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('detalles_proforma');
    }
}
