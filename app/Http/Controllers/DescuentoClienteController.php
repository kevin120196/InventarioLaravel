<?php

namespace App\Http\Controllers;
use App\Descuento_cliente;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DescuentoClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $descuento_cliente=Descuento_Cliente::orderBy('id','ASC')->paginate(3);
        return view('admin.descuentos.index')->with('descuento_cliente',$descuento_cliente);
        
    }

    public function create(){
        return view('admin.descuentos.create');

    }

    public function store(Request $reques){
        $descuento_cliente=new Descuento_Cliente($reques->all());
        $descuento_cliente->save();
        Alert::success('Exito!','El descuento ha sido creada con exito' );
        //flash('La categoria' . $categoria->nombre_categoria . ' ha sido creada con exito', 'success');
        return redirect()->route('descuentos.index');
    }

    public function edit($id){
        $descuento_cliente=Descuento_Cliente::find($id);
        return view('admin.descuentos.edit')->with('descuento_cliente',$descuento_cliente);
    }

    public function update(Request $request,$id){
        $descuento_cliente=Descuento_Cliente::find($id);
        $descuento_cliente->fill($request->all());
        $descuento_cliente->save();
        Alert::success('Exito!','El descuento cliente ha sido actualizado');
        return redirect()->route('descuentos.index');
    }

    public function destroy($id){
        $descuento_cliente=Descuento_Cliente::find($id);
        $descuento_cliente->delete();
        Alert::error('Eliminado!', 'El descuento cliente ha sido eliminada');
        return redirect()->route('descuentos.index');
    }
}
