<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //
    protected $table="productos";
    protected $fillable=['marca_id','categoria_id','proveedor_id'];

     public function marca () {
        return $this-> belongsTo('app\Marca');
         }
     public function categoria () {
        return $this-> belongsTo('app\Categoria');
         }
    public function proveedor () {
        return $this-> belongsTo('app\Proveedor');
         }

}
