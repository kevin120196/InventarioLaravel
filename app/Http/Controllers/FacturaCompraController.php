<?php

namespace App\Http\Controllers;
use app\Factura_Compra;
use Illuminate\Http\Request;

class FacturaCompraController extends Controller
{
    public function index(){
        $facturacompra=Factura_Compra::orderBy('id','ASC')->paginate(3);
        return view('admin.factura_compra.index')->with('factura_compra',$factura_compra);
        
    }
}
