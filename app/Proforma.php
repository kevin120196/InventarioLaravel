<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    //
    protected $table="proformas";
    protected $fillable=['fecha_proforma','vendedores_id','clientes_id','descuentos_clientes_id'];
}
