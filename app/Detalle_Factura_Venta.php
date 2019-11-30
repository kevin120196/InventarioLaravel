<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Factura_Venta extends Model
{
    //
    protected $table="detalles_facturas_ventas";
    protected $fillable=['cantidad','precio','total','facturas_ventas_id','productos_producto_id'];
    
    public function facturaVenta(){
        return $this->belongsTo('App\Factura_Venta');
    }

    public function productos(){
        return $this->belongsTo('App\Productos');
    }
}
