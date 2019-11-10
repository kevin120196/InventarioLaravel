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
            //$table->enum('estado_factura',['Cancelada','Pendiente']);            
            //claves foraneas
            $table->integer('tipo_factura_id')->unsigned();
            $table->integer('proveedores_id')->unsigned();
            $table->integer('estados_facturas_id')->unsigned();
            //Referencias claves
            $table->foreign('tipo_factura_id')->references('id')->on('tipos_facturas')->onDelete('cascade');
            //$table->foreign('tipo_factura_id')->references('id')->on('tipos_facturas')->onDelete('cascade');
            $table->foreign('estados_facturas_id')->references('id')->on('estados_facturas')->onDelete('cascade');
            $table->foreign('proveedores_id')->references('id')->on('proveedores')->onDelete('cascade');
            //
        });
<<<<<<< HEAD

        Schema::create('detalle_factura_compra',function(Blueprint $table){
            $table->increments('id');
            //$table->date('fecha');
            $table->double('cantidad');
            $table->double('precio');
            $table->double('total');
            //claves foraneas
            $table->integer('facturas_compras_id')->unsigned();
            //$table->integer('facturas_compras_estados_facturas_id')->unsigned();
            //$table->integer('facturas_compras_tipos_facturas_id')->unsigned();
            $table->integer('facturas_compras_proveedores_id')->unsigned();
            $table->integer('productos_id_productos')->unsigned();
            $table->integer('productos_categorias_productos_id')->unsigned();
            $table->integer('productos_marcas_productos_id')->unsigned();
            $table->integer('productos_proveedores_id')->unsigned();
            //referncias claves foraneas
            $table->foreign('facturas_compras_id')->references('id')->on('facturas_compras')->onDelete('cascade');
            //$table->foreign('facturas_compras_estados_facturas')->on('id')->references('facturas_compras')->onDelete('cascade');
            //$table->foreign('facturas_compras_tipos_facturas_id')->on('id')->references('facturas_compras')->onDelete('cascade');
            $table->foreign('facturas_compras_proveedores_id')->references('id')->on('facturas_compras')->onDelete('cascade');
            $table->foreign('productos_id_productos')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('productos_categorias_productos_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('productos_marca_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('productos_proveedores_id')->references('id')->on('productos')->onDelete('cascade');
            //
            $table->timestamps();

            
        });

=======
>>>>>>> 9f14e1e7766bfbd953666ff01457baac58d5a4b8
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
