<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table="clientes";
    protected $fillable=['nombre','direccion','cedula','numero_telefono','correo_electronico','descuento_id'];

    public function descuento() {
        return $this->belongsTo('App\Descuento_Cliente');
    }

    public function factura() {
        return $this->belongsTo('App\Factura_Venta');
    }

    public function proformas() {
        return $this->belongsTo('App\Proforma');     
    }

    public function scopeNombre($query,$nombre){
        return $query->where('nombre','LIKE',"%$nombre%");
    }
    public function scopeDireccion($query,$direccion){
        return $query->where('direccion','LIKE',"%$direccion%");
    }
    public function scopeEmail($query,$correo_electronico){
        return $query->where('correo_electronico','LIKE',"%$correo_electronico%");
    }
}
