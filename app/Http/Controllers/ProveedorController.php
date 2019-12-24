<?php

namespace App\Http\Controllers;
use App\Proveedor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\proveedorRequest;
use PDF;
use Carbon\Carbon;
class ProveedorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $proveedor=Proveedor::orderBy('id','ASC')
        ->nombre($request->nombre)
        ->direccion($request->direccion)
        ->email($request->correo_electronico)
        ->paginate(10);
        return view('admin.proveedor.index')->with('proveedor',$proveedor);
    }

    public function show(){
        $proveedor=Proveedor::orderBy('id','ASC')
        ->paginate(10);
        $pdf=PDF::loadView('admin.proveedor.show',['proveedor'=>$proveedor]);
        $fileName='reporte_proveedores '. Carbon::now();
        return $pdf->stream($fileName.'.pdf');
    }

    public function create(){
        return view('admin.proveedor.create');
    }


    public function store(proveedorRequest $request){
        $proveedor = new Proveedor($request->all());
        $proveedor->save();
        Alert::success('Exito!','El proveedor ' .$proveedor->nombre_proveedor. ' ha sido registrado Correctamente');
        return redirect()->route('proveedores.index');

    }

    public function edit($id){
        $proveedor=Proveedor::find($id);
        return view('admin.proveedor.edit')->with('proveedor',$proveedor);
    }

    public function update(proveedorRequest $request,$id){
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
