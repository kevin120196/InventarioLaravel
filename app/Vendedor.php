<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    //
    protected $table="vendedores";
    protected $fillable=['nombre_vendedor','cedula_vendedor','direccion','telefono_vendedor','correo_electronico'];

    public function proformas() {
        return $this->hasMany('App\Proforma');     
    }

    public function factura_ventas() {
        return $this->hasMany('App\Factura_Venta');     
    }

    public function scopeNombre($query,$nombre){
        return $query->where('nombre_vendedor','LIKE',"%$nombre%");
    }
    public function scopeDireccion($query,$direccion){
        return $query->where('direccion','LIKE',"%$direccion%");
    }
    public function scopeEmail($query,$correo_electronico){
        return $query->where('correo_electronico','LIKE',"%$correo_electronico%");
    }
}
