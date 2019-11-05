<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    //
    protected $table="vendedores";
    protected $fillable=['nombre_vendedor','direccion','telefono_vendedor','correo_electronio'];
}
