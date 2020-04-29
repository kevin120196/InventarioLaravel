<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle_Factura_Venta;
use App\Factura_Venta;
use App\Producto;
class DetalleFacturaVentaController extends Controller
{
    //

    public function index(){
        $detalle=Detalle_Factura_Venta::orderBy('id','ASC')->paginate(10);
        $detalle->each(function($detalle){
            $detalle->facturaVenta;
        });
        return view('admin.detalleVenta.index')->with('detalle',$detalle);
    }


}
