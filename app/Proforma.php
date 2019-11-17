<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    //
    protected $table="proformas";
    protected $fillable=['fecha_proforma','vendedores_id',
    'clientes_id','descuentos_clientes_id'];

    public function Cliente () {
        return $this-> hashMany('app\Cliente');     
    }

    public function vendedor () {
        return $this-> hashMany('app\Vendedor');     
    }

    public function descuentos_clientes () {
        return $this-> belongsTo('app\Descuento_Cliente');     
    }
}
