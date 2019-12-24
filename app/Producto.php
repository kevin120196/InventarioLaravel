<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table="productos";
    protected $primaryKey="id";
    protected $fillable=['codigo_original','codigo_alterno','cantidad','precio_compra','precio_venta','aplicacion','descripcion','unidad_medida','numero_rack','marca_id','categoria_id','proveedor_id'];

    public function marca(){
        return $this->belongsTo('App\Marca');
    }

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    public function proveedor(){
        return $this->belongsTo('App\Proveedor');
    }

    public function detallesVenta(){
        return $this->belongsToMany('App\Detalle_Factura_Venta');
    }

    public function scopeCodigo($query,$codigo){
        return $query->where('codigo_alterno','LIKE',"%$codigo%");
    }

    public function scopeDescripcion($query,$descripcion){
        return $query->where('descripcion','LIKE',"%$descripcion%");
    }

    public function scopeEstante($query,$estante){
        return $query->where('numero_rack','LIKE',"%$estante%");
    }

    public function scopeAplicacion($query,$aplicacion){
        return $query->where('aplicacion','LIKE',"%$aplicacion%");
    }


    public static function productos($id){
        return Producto::where('proveedor_id','=',$id)->get();
    }
}

