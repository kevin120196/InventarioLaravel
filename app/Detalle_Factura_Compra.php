<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Factura_Compra extends Model
{
    protected $table="detalles_facturas_compras";
    protected $fillable=['fecha','cantidad','precio','total','facturas_compras_id',
    'facturas_compras_estados_id','facturas_compras_tipos_id','facturas_compras_proveedor_id',
    'productos_id_productos','productos_categorias_productos_id','productos_proveedores_id'];

    public function proveedores () {
        return $this-> hashMany('app\Proveedor');     
    }
    public function vendedor () {
        return $this-> hashMany('app\Vendedor');     
    }

    public function tipos_factura () {
        return $this-> belongsTo('app\Tipo_Factura');     
    }
    public function estados_factura () {
        return $this-> belongsTo('app\Estado_Factura');     
    }
    public function productos () {
        return $this-> belongsTo('app\Productos');     
    }
    
}
