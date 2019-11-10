<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura_Venta extends Model
{
    protected $table="facturas_ventas";
    protected $fillable=['fecha_factura','tipos_factura','estado_factura','clientes_id',
    'descuentos_clientes_id','vendedores_id'];

    public function clientes () {
        return $this-> hashMany('app\Cliente');     
    }

    


}
