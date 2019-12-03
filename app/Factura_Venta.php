<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura_Venta extends Model
{
    protected $table="facturas_ventas";
    protected $fillable=['fecha_factura','tipos_factura','estado_factura','clientes_id',
    'descuentos_clientes_id','vendedores_id','totalgeneral'];


    public function clientes () {
        return $this->belongsTo('App\Cliente');     
    }
    public function vendedores () {
        return $this->belongsTo('App\Vendedor');     
    }

    public function tipos_factura () {
        return $this->belongsTo('App\Tipo_Factura');     
    }

    public function descuentos_clientes () {
        return $this->belongsTo('App\Descuento_Cliente');     
    }
    

    public function detalleVenta(){
        return $this->belongsToMany('App\Detalle_Factura_Venta','factura_producto_venta')->withPivot('facturas_ventas_id','id');
    }

}
