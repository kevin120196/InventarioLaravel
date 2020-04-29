<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Factura_Compra extends Model
{
    protected $table="factura_producto_compra";
    protected $fillable=['cantidad','precio','subtotal','facturas_compras_id','productos_id_productos'];

    public function facturaCompra(){
        return $this->belongsToMany('App\Factura_Compra','factura_producto_compra','facturas_compras_id','productos_id_productos');
    }

    public function producto(){
        return $this->belongsToMany('App\Producto','factura_producto_compra','facturas_compras_id','productos_id_productos');
    }

}
