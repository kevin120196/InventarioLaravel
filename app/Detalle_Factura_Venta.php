<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Factura_Venta extends Model
{
    //
    protected $table="factura_producto_venta";
    protected $fillable=['cantidad','precio','total','venta_id','marca_id'];
    
    public function facturaVenta(){
        return $this->belongsToMany('App\Factura_Venta','factura_producto_venta','venta_id','marca_id');
    }

    public function producto(){
        return $this->belongsTo('App\Producto','factura_producto_venta','marca_id','venta_id');
    }
}
