<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento_Cliente extends Model
{
    protected $table="descuentos_clientes";
    protected $fillable=['descuento_cliente'];

    public function cliente() {
        return $this->hasMany('app\Cliente');     
    }
}
