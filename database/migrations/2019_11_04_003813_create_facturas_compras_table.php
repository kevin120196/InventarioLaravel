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
            $table->integer('codigo_factura');
            $table->date('fecha_compra');
            //$table->enum('tipos_factura',['Credito','Contado']);
            $table->enum('estado_factura',['Pagada','Pendiente','Anulada','Devolución'])->default('Pagada');            
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

            $table->double('total');
            $table->timestamps();
        });

        Schema::create('factura_producto_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->double('cantidad');
            $table->double('precio');
            $table->double('subtotal');
            //claves foraneas
            $table->integer('facturas_compras_id')->unsigned();
            //$table->integer('facturas_compras_estados_id')->unsigned();
            //$table->integer('facturas_compras_tipos_id')->unsigned();
            //$table->integer('facturas_compras_proveedor_id')->unsigned();
            $table->integer('productos_id_productos')->unsigned();
            //$table->integer('productos_categoria_id')->unsigned();
           // $table->integer('productos_proveedores_id')->unsigned();
            //referncias claves foraneas
            $table->foreign('facturas_compras_id')->references('id')->on('facturas_compras')->onDelete('cascade');
            //$table->foreign('facturas_compras_estados_id')->references('id')->on('facturas_compras')->onDelete('cascade');
            //$table->foreign('facturas_compras_tipos_id')->references('id')->on('facturas_compras')->onDelete('cascade');
            //$table->foreign('facturas_compras_proveedor_id')->references('id')->on('facturas_compras')->onDelete('cascade');
            $table->foreign('productos_id_productos')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('facturas_compras');
    }
}
