<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura_Compra extends Model
{
    protected $table="facturas_compras";
    protected $fillable=['fecha_compra','tipo_factura_id','proveedores_id',
    'estados_facturas_id',];

    public function proveedor() { 
        return $this->belongsTo('App\Proveedor');
     } 

     public function estados_facturas () {
        return $this->belongsTo('App\Estado_Factura');     
    }

    public function productos () {
        return $this->belongsTo('App\Productos');     
    }
}
