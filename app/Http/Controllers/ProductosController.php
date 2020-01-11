<?php

namespace App\Http\Controllers;
use app\Productos;
use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use App\Marca;
use App\Proveedor;
use PDF;
use App\Http\Requests\productoRequest;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
class ProductosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
                
    }

    public function index(Request $request){
        $productos=Producto::codigo($request->codigo)->orderBy('id','ASC')
        ->descripcion($request->descripcion)
        ->estante($request->estante)
        ->paginate(10);
        $productos->each(function($productos){
            $productos->categoria;
            $productos->marca;
            $productos->proveedor;
        });
        return view('admin.productos.index')->with('productos',$productos);
         
    }

    public function show(){
        $productos=Producto::orderBy('id','ASC')
        ->paginate(10);
        $productos->each(function($productos){
            $productos->categoria;
            $productos->marca;
            $productos->proveedor;
        });
        $pdf=PDF::loadView('admin.productos.show',['productos'=>$productos])->setPaper('A4', 'landscape');;
        $fileName='reporte_productos '. Carbon::now();
        return $pdf->stream($fileName.'.pdf');
    }



    public function create(){
        $categoria=Categoria::orderBy('nombre_categoria','ASC')->pluck('nombre_categoria','id')->prepend('Seleccione una categoria');
        $marcas=Marca::orderBy('nombre_marca','ASC')->pluck('nombre_marca','id')->prepend('Seleccione una marca');
        $proveedores=Proveedor::orderBy('nombre_proveedor','ASC')->pluck('nombre_proveedor','id')->prepend('Seleccione un proveedor');
        return view('admin.productos.create')->with('categoria',$categoria)->with('marcas',$marcas)->with('proveedores',$proveedores);
    }

    public function store(productoRequest $request){
        
        $producto=new Producto($request->all());
        //dd($producto->categoria);
        /*$producto->codigo_original=$request->codigo_original;
        $producto->codigo_alterno=$request->codigo_alterno;
        $producto->cantidad=$request->cantidad;
        $producto->precio_compra=$request->precio_compra;
        $producto->precio_venta=$request->precio_venta;
        $producto->aplicacion=$request->aplicacion;
        $producto->descripcion=$request->descripcion;
        $producto->numero_rack=$request->numero_rack;
        $producto->unidad_medida=$request->unidad_medida;
        $producto->categoria_id=$request->categoria_id;
        $producto->marca_id=$request->marca_id;
        $producto->proveedor_id=$request->proveedor_id;        
        */
        $producto->save();
        
         Alert::success('Exito!','El producto '.$producto->marca->nombre_marca .' ha sido registrado Correctamente');
        return redirect()->route('productos.index');
    }

    public function edit($id){
        
        $producto=Producto::find($id);
        $producto->proveedor;
        $categoria=Categoria::orderBy('nombre_categoria','ASC')->pluck('nombre_categoria','id')->prepend('Seleccione una categoria');
        $marcas=Marca::orderBy('nombre_marca','ASC')->pluck('nombre_marca','id')->prepend('Seleccione una marca');
        $proveedores=Proveedor::orderBy('nombre_proveedor','DESC')->pluck('nombre_proveedor','id')->prepend('Seleccione un proveedor');
        return view('admin.productos.edit')->with('producto',$producto)->with('categoria',$categoria)->with('marcas',$marcas)->with('proveedores',$proveedores);
    }

    public function update(productoRequest $request, $id){
        $producto=Producto::find($id);
        $producto->fill($request->all());
        $producto->save();
        Alert::success('Exito!','El producto '.$producto->marca->nombre_marca .' ha sido actualizado');
        

        return redirect()->route('productos.index');
    
    }

    public function destroy($id){
        $producto=Producto::find($id);
        $producto->delete();
        Alert::error('Eliminado!', 'El producto ' .$producto->marca->nombre_marca. ' ha sido eliminado');
        return redirect()->route('productos.index');

    }
}
