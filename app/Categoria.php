<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table="categorias";
    protected $guarded=['id'];
    protected $fillable=['nombre_categoria'];

    public function producto() {
        return $this ->hasMany('App\Productos');     
    }
}
