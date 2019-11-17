<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Factura extends Model
{
    public function facturas_compras () {
        return $this-> hashMany('app\Factura_Compra');     
    }

    public function facturas_ventas () {
        return $this-> hashMany('app\Factura_Venta');     
    }
}
