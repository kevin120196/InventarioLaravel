<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura_Compra extends Model
{
    protected $table="facturas_compras";
    protected $fillable=['fecha_compra','tipos_factura','estado_factura','proveedores_id',
    'fecha','cantidad','precio','total','productos_id_productos','productos_marcas_productos_id'
    ,'productos_categorias_productos_id'];

    public function proveedor() { 
        return $this-> belongsTo('app\Proveedor');
     } 
}
