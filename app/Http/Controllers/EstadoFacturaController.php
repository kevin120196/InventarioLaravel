<?php

namespace App\Http\Controllers;
use app\estados_facturas;
use Illuminate\Http\Request;

class EstadoFacturaController extends Controller
{
    public function index(){
        $estado_factura=estados_facturas::orderBy('id','ASC')->paginate(3);
        return view('admin.estados_facturas.index')->with('estados_facturas',$estado_factura);
        
    }

    public function create(){
        return view('admin.estados_facturas.create');

    }

    public function store(Request $reques){
        $estado_factura=new estados_facturas($reques->all());
        $estado_factura->save();
        Alert::success('Exito!','El estado de la factura ' . $estado_factura->estado_factura_nombre . ' ha sido creada con exito' );
        //flash('La categoria' . $categoria->nombre_categoria . ' ha sido creada con exito', 'success');
        return redirect()->route('estados_facturas.index');
    }

    public function edit($id){
        $estado_factura=estados_facturas::find($id);
        return view('admin.estados_facturas.edit')->with('descuento_cliente',$estado_factura);
    }

    public function update(Request $request,$id){
        $estado_factura=estados_facturas::find($id);
        $estado_factura->fill($request->all());
        $estado_factura->save();
        Alert::success('Exito!','El estado de la factura ' .$estado_factura->estado_factura_nombre. ' ha sido actualizado');
        return redirect()->route('estados_facturas.index');
    }

    public function destroy($id){
        $estado_factura=estados_facturas::find($id);
        $estado_factura->delete();
        Alert::error('Eliminado!', 'El estado de la factura ' .$estado_factura->estado_factura_nombre. ' ha sido eliminada');
        return redirect()->route('estados_facturas.index');
    }
}
