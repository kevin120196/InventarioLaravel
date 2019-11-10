<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table="proveedores";
    protected $fillable=['nombre_proveedor','cedula','direccion_proveedor',
                         'numero_telefono_proveedor','correo_electronico_proveedor'];

    public function facturas_compras() { 
        return $this-> hashMany('app\Factura_Compra');
     }
     
     public function producto () {
        return $this-> hashMany('app\Productos');     
    }

}
