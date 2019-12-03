<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura_Venta;
use App\Detalle_Factura_Venta;
use App\Tipo_Factura;
use App\Cliente;
use App\Descuento_Cliente;
use App\Vendedor;
use App\Categoria;
use App\Marca;
use App\Producto;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
class FacturaVentaController extends Controller
{
    //

    public function index(){
        $venta= Factura_Venta::orderBy('id','DESC')->paginate(5);
        $venta->each(function($venta){
            $venta->clientes;
            $venta->descuentos_clientes;
            $venta->vendedores;
            $venta->productos;
        });
        return view('admin.venta.index')->with('venta',$venta);
    }

    public function show($id){
        $venta=Factura_Venta::find($id);
        $venta->each(function($venta){
            $venta->clientes;
            $venta->descuentos_clientes;
            $venta->vendedores;
            $venta->productos;
            $venta->tipos_factura;
        });
        $detalle=Detalle_Factura_Venta::orderBy('id','ASC')->where('venta_id','=',$id)->get();
        return view('admin.venta.show')->with('venta',$venta)->with('detalle',$detalle);
    }

    public function create(){

        $categoria=Categoria::orderBy('nombre_categoria','ASC')->pluck('nombre_categoria','id')->prepend('Seleccione una categoria');
        $producto=Producto::orderBy('marca_id','ASC')->pluck('marca_id','id')->prepend('Producto');
        $vendedor=Vendedor::orderBy('nombre_vendedor','ASC')->pluck('nombre_vendedor','id')->prepend('Vendedor');
        $descuento=Descuento_Cliente::orderBy('descuento_cliente','ASC')->pluck('descuento_cliente','id')->prepend('Descuento');
        $cliente=Cliente::orderBy('nombre','ASC')->pluck('nombre','id')->prepend('Nombre Cliente');
        $Tipo=Tipo_Factura::orderBy('tipo_factura_nombre','ASC')->pluck('tipo_factura_nombre','id')->prepend('Tipo Factura');
        return view('admin.venta.create')->with('Tipo',$Tipo)->with('cliente',$cliente)->with('descuento',$descuento)->with('vendedor',$vendedor)
        ->with('categoria',$categoria)->with('producto',$producto);
    }

    public function store(Request $request){
        $venta=new Factura_Venta();
        
        DB::beginTransaction();
        try {
                $venta->totalgeneral=$request->totalgeneral;
                $venta->fecha_factura=$request->fecha_factura;
                $venta->tipos_factura_id=$request->tipos_factura_id;
                $venta->estado_factura=$request->estado_factura;
                $venta->clientes_id=$request->clientes_id;
                $venta->descuentos_clientes_id=$request->descuentos_clientes_id;
                $venta->vendedores_id=$request->vendedores_id;        
                $contador= count(request()->marca_id);
                $venta->save();
                //dd($request->producto_cantidad_id[0]);
                
                for ($i=0; $i < $contador; $i++) { 
                    # code...
                    
                    $detalle=new Detalle_Factura_Venta();
                    $detalle->cantidad=$request->cantidad[$i];
                    $detalle->precio=$request->precio[$i];
                    $detalle->total=$request->total[$i];
                    $detalle->venta_id=$venta->id;
                    $detalle->marca_id=$request->marca_id[$i];
                    
                $detalle->save();
                }
                
                DB::commit();
                Alert::success('Exito!','La venta '.$venta->id .' ha sido realizada de forma Correcta!!');
  
                return redirect()->route('ventas.index');
                
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            DB::rollBack();
        }
    }
}
