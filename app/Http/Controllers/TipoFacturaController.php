<?php

namespace App\Http\Controllers;
use app\Tipo_Factura;
use Illuminate\Http\Request;

class TipoFacturaController extends Controller
{
    public function index(){
        $tipo_factura=Tipo_Factura::orderBy('id','ASC')->paginate(3);
        return view('admin.tipo_factura.index')->with('tipo_factura',$tipo_factura);
        
    }

    public function create(){
        return view('admin.tipo_factura.create');

    }

    public function store(Request $reques){
        $tipo_factura=new Tipo_Factura($reques->all());
        $tipo_factura->save();
        Alert::success('Exito!','El tipo de factura  ' . $tipo_factura->nombre_categoria . ' ha sido creada con exito' );
        //flash('La categoria' . $categoria->nombre_categoria . ' ha sido creada con exito', 'success');
        return redirect()->route('tipo_factura.index');
    }

    public function edit($id){
        $tipo_factura=Tipo_Factura::find($id);
        return view('admin.tipo_factura.edit')->with('tipo_factura',$tipo_factura);
    }

    public function update(Request $request,$id){
        $tipo_factura=Tipo_Factura::find($id);
        $tipo_factura->fill($request->all());
        $tipo_factura->save();
        Alert::success('Exito!','El tipo de factura  ' .$tipo_factura->nombre_categoria. ' ha sido actualizado');
        return redirect()->route('categorias.index');
    }

    public function destroy($id){
        $tipo_factura=Tipo_Factura::find($id);
        $tipo_factura->delete();
        Alert::error('Eliminado!', 'El tipo de factura  ' .$tipo_factura->nombre_categoria. ' ha sido eliminada');
        return redirect()->route('tipo_factura.index');
    }
}
