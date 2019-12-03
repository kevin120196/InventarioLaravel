<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura_Compra extends Model
{
    protected $table="facturas_compras";
    protected $fillable=['fecha_compra','tipo_factura_id','proveedores_id',
    'estado_factura','totalgeneral'];

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
}
