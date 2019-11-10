<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table="clientes";
    protected $fillable=['nombre','direccion','cedula','numero_telefono','correo_electronico','descuento_id'];

    public function descuento_cliente () {
        return $this-> belongsTo('app\Descuento_Cliente');
    }

    public function factura_venta () {
        return $this-> belongsTo('app\Factura_Venta');
    }
}
