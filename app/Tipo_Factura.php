<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Factura extends Model
{
    protected $table="tipos_facturas";
    protected $fillable=['tipo_factura_nombre'];

    public function factura_venta() {
        return $this->hasMany('app\Factura_Venta');     
    }

    public function factura_compra() {
        return $this->hasMany('app\Factura_Compra');     
    }
}
