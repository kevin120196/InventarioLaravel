<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura_Venta extends Model
{
    protected $table="facturas_ventas";
    protected $fillable=['fecha_factura','tipos_factura','estado_factura','clientes_id',
    'descuentos_clientes_id','vendedores_id'];


    public function clientes () {
        return $this->hasMany('App\Cliente');     
    }
    public function vendedor () {
        return $this->hasMany('App\Vendedor');     
    }

    public function tipos_factura () {
        return $this->belongsTo('App\Tipo_Factura');     
    }
    public function estados_factura () {
        return $this->belongsTo('App\Estado_Factura');     
    }

    public function descuentos_clientes () {
        return $this->belongsTo('App\Descuento_Cliente');     
    }

}
