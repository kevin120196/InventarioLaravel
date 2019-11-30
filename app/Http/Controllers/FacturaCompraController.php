<?php

namespace App\Http\Controllers;
use app\Factura_Compra;
use App\Tipo_Factura;
use App\Proveedor;
use App\Categoria;
use App\Marca;
use App\Producto;
use Illuminate\Http\Request;

class FacturaCompraController extends Controller
{
    public function index(){
        $facturacompra=Factura_Compra::orderBy('id','ASC')->paginate(3);
        return view('admin.factura_compra.index')->with('factura_compra',$factura_compra);
        
    }

    public function create(){
        $proveedor=Proveedor::orderBy('nombre_proveedor','ASC')->pluck('nombre_proveedor','id')->prepend('Proveedor');
        $marcas=Marca::orderBy('nombre_marca','ASC')->pluck('nombre_marca','id')->prepend('Producto');
        $Tipo=Tipo_Factura::orderBy('tipo_factura_nombre','ASC')->pluck('tipo_factura_nombre','id')->prepend('Tipo Factura');
        return view('admin.compra.create')->with('Tipo',$Tipo)->with('proveedor',$proveedor)->with('marcas',$marcas);
    }
}
