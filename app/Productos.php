<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //
    protected $table="productos";
    protected $fillable=['codigo_original','codigo_alterno','cantidad','precio_compra','precio_venta','aplicacion','descripcion','unidad_medida','numero_rack','marca_id','categoria_id','proveedor_id'];
}
