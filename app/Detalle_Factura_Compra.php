<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Factura_Compra extends Model
{
    protected $table="Detalles_facturas_compras";
    protected $fillable=['cantidad','precio','total','facturas_compras_id','facturas_compras_tipos_id','facturas_compras_proveedor_id','productos_id_productos','productos_categoria_id','productos_proveedores_id'];

    public function facturaCompra(){
        return $this->belongsTo('App\Factura_Compra')
    }

    public function productos(){
        return $this->belongsTo('App\Productos')
    }

}
