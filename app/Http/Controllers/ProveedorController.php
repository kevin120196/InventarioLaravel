<?php

namespace App\Http\Controllers;
use App\Proveedor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProveedorController extends Controller
{
    //

    public function index(){
        $proveedor=Proveedor::orderBy('id','ASC')->paginate(10);
        return view('admin.proveedor.index')->with('proveedor',$proveedor);
    }

    public function create(){
        return view('admin.proveedor.create');
    }


    public function store(Request $request){
        $proveedor = new Proveedor($request->all());
        $proveedor->save();
        Alert::success('Exito!','El proveedor ' .$proveedor->nombre_proveedor. ' ha sido registrado Correctamente');
        return redirect()->route('proveedores.index');

    }

    public function edit($id){
        $proveedor=Proveedor::find($id);
        return view('admin.proveedor.edit')->with('proveedor',$proveedor);
    }

    public function update(Request $request,$id){
        $proveedor=Proveedor::find($id);
        $proveedor->fill($request->all());
        $proveedor->save();
        Alert::success('Exito!','El proveedor ' .$proveedor->nombre_proveedor. ' ha sido actualizado');
        return redirect()->route('proveedores.index');
    }

    public function destroy($id){
        $proveedor=Proveedor::find($id);
        $proveedor->delete();
        Alert::error('Eliminado!','El proveedor ' .$proveedor->nombre_proveedor. 'ha sido eliminado');
        return redirect()->route('proveedores.index');
    }
}
