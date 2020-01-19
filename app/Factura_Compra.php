<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura_Compra extends Model
{
    protected $table="facturas_compras";
    protected $fillable=['codigo_factura','fecha_compra','tipo_factura_id','proveedores_id',
    'estado_factura','total','estado_impreso'];

    public function proveedores() { 
        return $this->belongsTo('App\Proveedor');
    } 

    public function productos () {
        return $this->belongsTo('App\Productos');     
    }

    public function detallesCompra(){
        return $this->belongsTo('App\Detalle_Factura_Compra','Detalles_facturas_compras');
    }

    public function tipoFactura(){
        return $this->belongsTo('App\Tipo_Factura');
    }

    public function scopeCodigo($query,$codigo){
        return $query->where('codigo_factura','LIKE',"%$codigo%");
    }

    public function scopeFecha($query,$fecha){
        return $query->where('fecha_compra','LIKE',"%$fecha%");
    }
    public function scopeEstado($query,$estado){
        return $query->where('estado_factura','LIKE',"%$estado%");
    }

    public function scopeIntervalo($query,$inicio,$fin){
        return $query->whereBetween('fecha_compra',[$inicio,$fin]);
    }
}
