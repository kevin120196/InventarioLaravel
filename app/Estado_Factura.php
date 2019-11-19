<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Factura extends Model
{
    protected $table="Factura_compra";
    protected $fillable=['estado_factura_nombre'];


    public function facturas_compras () {
        return $this-> hashMany('app\Factura_Compra');     
    }

    public function facturas_ventas () {
        return $this-> hashMany('app\Factura_Venta');     
    }
}
