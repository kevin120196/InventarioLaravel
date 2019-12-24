<?php

namespace App\Http\Controllers;
use App\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Http\vendedoresRequest;
use RealRashid\SweetAlert\Facades\Alert;

class VendedorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $vendedor=Vendedor::orderBy('id','ASC')
        ->nombre($request->nombre)
        ->direccion($request->direccion)
        ->email($request->correo_electronico)
        ->paginate(3);
        return view('admin.vendedor.index')->with('vendedor',$vendedor);
        
    }

    public function create(){
         return view('admin.vendedor.create');
    }


    public function store(vendedoresRequest $request){
        $vendedores = new Vendedor($request->all());
        $vendedores->save();
        Alert::success('Exito!','El Vendedor ' .$vendedores->nombre_vendedor. ' ha sido registrado Correctamente');
        return redirect()->route('vendedores.index');

    }

    public function edit($id){
        $vendedor=Vendedor::find($id);
        return view('admin.vendedor.edit')->with('vendedor',$vendedor);
    }

    public function update(vendedoresRequest $request,$id){
        $vendedor=Vendedor::find($id);
        $vendedor->fill($request->all());
        $vendedor->save();
        Alert::success('Exito!','El vendedor ' .$vendedor->nombre_vendedor. ' ha sido actualizado');
        return redirect()->route('vendedores.index');
    }

    public function destroy($id){
        $vendedor=Vendedor::find($id);
        $vendedor->delete();
        Alert::error('Eliminado!','El vendedor ' .$vendedor->nombre. 'ha sido eliminado');
        return redirect()->route('cliente.index');
    }
}
