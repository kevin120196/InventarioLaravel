<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table="proveedores";
    protected $fillable=['nombre_proveedor','cedula','direccion_proveedor',
                         'numero_telefono_proveedor','correo_electronico_proveedor'];

    public function compra() { 
        return $this->belongsTo('App\Factura_Compra');
     }
     
     public function producto() {
        return $this->hasMany('App\Productos');     
    }

    public function scopeNombre($query,$nombre){
        return $query->where('nombre_proveedor','LIKE',"%$nombre%");
    }
    public function scopeDireccion($query,$direccion){
        return $query->where('direccion_proveedor','LIKE',"%$direccion%");
    }
    public function scopeEmail($query,$correo_electronico){
        return $query->where('correo_electronico_proveedor','LIKE',"%$correo_electronico%");
    }

}
