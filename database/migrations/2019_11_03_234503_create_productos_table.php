<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_original',20);
            $table->string('codigo_alterno',20);
            $table->integer('cantidad')->unsigned();
            $table->double('precio_compra')->unsigned();
            $table->double('precio_venta')->unsigned();
            $table->text('aplicacion');
            $table->text('descripcion');
            $table->string('unidad_medida');
            $table->integer('numero_rack')->unsigned();
            //claves foraneas
            $table->integer('marca_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->integer('proveedor_id')->unsigned();
            //referencias claves foraneas
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
