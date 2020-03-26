<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Descuento_Cliente;
use PDF;
use App\Http\Requests\clienteRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $cliente=Cliente::orderBy('id','ASC')
        ->nombre($request->nombre)
        ->direccion($request->direccion)
        ->email($request->correo_electronico)
        ->paginate(10);
        $cliente->each(function($cliente){
            $cliente->descuento;
        });

        return view('admin.cliente.index')->with('cliente',$cliente);
    }

    public function create(){
        $descuentos=Descuento_Cliente::orderBy('descuento_cliente','ASC')->pluck('descuento_cliente','id')->prepend('seleccione la opcion que desee');
        return view('admin.cliente.create')->with('descuentos',$descuentos);
    }


    public function store(clienteRequest $request){
        $cliente = new Cliente($request->all());
        $cliente->save();
        Alert::success('Exito!','El cliente ' .$cliente->nombre. ' ha sido registrado Correctamente');
        return redirect()->route('cliente.index');

    }

    public function show(){
        $cliente=Cliente::orderBy('id','ASC')
        ->paginate(10);
        $cliente->each(function($cliente){
            $cliente->descuento;
        });
        $pdf=PDF::loadView('admin.cliente.show',['cliente'=>$cliente]);
        $fileName='reporte_clientes '. Carbon::now();
        return $pdf->stream($fileName.'.pdf');
    }

    public function edit($id){
        $descuentos=Descuento_Cliente::orderBy('descuento_cliente','ASC')->pluck('descuento_cliente','id')->prepend('seleccione la opcion que desee');
        $cliente=Cliente::find($id);
        return view('admin.cliente.edit')->with('cliente',$cliente)->with('descuentos',$descuentos);
    }

    public function update(clienteRequest $request,$id){
        
        $cliente=Cliente::find($id);
        $cliente->fill($request->all());
        $cliente->save();
        Alert::success('Exito!','El cliente ' .$cliente->nombre. ' ha sido actualizado');
        return redirect()->route('cliente.index');
    }

    public function destroy($id){
        $cliente=Cliente::find($id);
        $cliente->delete();
        Alert::error('Eliminado!','El cliente ' .$cliente->nombre. 'ha sido eliminado');
        return redirect()->route('cliente.index');
    }
}
