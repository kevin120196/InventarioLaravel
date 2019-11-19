<?php

namespace App\Http\Controllers;
use app\Descuento_cliente;
use Illuminate\Http\Request;

class DescuentoClienteController extends Controller
{
    public function index(){
        $descuento_cliente=Descuento_Cliente::orderBy('id','ASC')->paginate(3);
        return view('admin.descuentos_clientes.index')->with('descuento_cliente',$descuento_cliente);
        
    }

    public function create(){
        return view('admin.descuentos_clientes.create');

    }

    public function store(Request $reques){
        $descuento_cliente=new Descuento_Cliente($reques->all());
        $descuento_cliente->save();
        Alert::success('Exito!','El descuento cliente ' . $descuento_cliente->nombre_marca . ' ha sido creada con exito' );
        //flash('La categoria' . $categoria->nombre_categoria . ' ha sido creada con exito', 'success');
        return redirect()->route('descuentos_clientes.index');
    }

    public function edit($id){
        $descuento_cliente=Descuento_Cliente::find($id);
        return view('admin.descuentos_clientes.edit')->with('descuento_cliente',$descuento_cliente);
    }

    public function update(Request $request,$id){
        $descuento_cliente=Descuento_Cliente::find($id);
        $descuento_cliente->fill($request->all());
        $descuento_cliente->save();
        Alert::success('Exito!','El descuento cliente ' .$descuento_cliente->descuento_cliente. ' ha sido actualizado');
        return redirect()->route('descuentos_clientes.index');
    }

    public function destroy($id){
        $descuento_cliente=Descuento_Cliente::find($id);
        $descuento_cliente->delete();
        Alert::error('Eliminado!', 'El descuento cliente ' .$descuento_cliente->descuento_cliente. ' ha sido eliminada');
        return redirect()->route('descuentos_clientes.index');
    }
}
