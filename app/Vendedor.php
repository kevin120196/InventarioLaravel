<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    //
    protected $table="vendedores";
    protected $fillable=['nombre_vendedor','direccion','telefono_vendedor','correo_electronio'];

    public function proformas() {
        return $this->hasMany('app\Proforma');     
    }

    public function factura_ventas() {
        return $this->hasMany('app\Factura_Venta');     
    }
}
