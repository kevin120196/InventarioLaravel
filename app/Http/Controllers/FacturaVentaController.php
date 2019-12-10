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
use PDF;
use RealRashid\SweetAlert\Facades\Alert;
class FacturaVentaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $productos=Producto::orderBy('id','ASC')->paginate(5);
        $venta= Factura_Venta::orderBy('id','DESC')
        ->codigo($request->codigo)
        ->fecha($request->fecha)
        ->estado($request->estado)
        ->paginate(5);
        $venta->each(function($venta){
            $venta->clientes;
            $venta->descuentos_clientes;
            $venta->vendedores;
            $venta->productos;
        });
        return view('admin.venta.index')->with('venta',$venta)->with('productos',$productos);
    }

    public function details(Request $request){

        return view('admin.venta.details');
    }

    public function show($id){
        $venta=Factura_Venta::find($id);
        $venta->each(function($venta){
            $venta->clientes;
            $venta->descuentos_clientes;
            $venta->vendedores;
            $venta->producto;
            $venta->tipos_factura;
        });
        //$detalle=Detalle_Factura_Venta::orderBy('id','ASC')->where('venta_id','=',$id)->get();
        $detalle=DB::table('factura_producto_venta as fac')
        ->join('productos as p', 'fac.producto_id','=','p.id')
        ->join('facturas_ventas as f','fac.venta_id','=','f.id')
        ->select('p.descripcion','fac.cantidad','fac.precio','fac.total')
        ->where('fac.venta_id','=',$id)
        ->get();
        
        return view('admin.venta.show')->with('venta',$venta)->with('detalle',$detalle);
    }

    public function create(Request $request){
        $productos=Producto::orderBy('id','ASC')
        ->codigo($request->codigo)
        ->paginate(10);
        $productos->each(function($productos){
            $productos->categoria;
            $productos->marca;
            $productos->proveedor;
        });
        $categoria=Categoria::orderBy('nombre_categoria','ASC')->pluck('nombre_categoria','id')->prepend('Seleccione una categoria');
        $producto=Producto::orderBy('descripcion','ASC')->pluck('descripcion','id')->prepend('Producto');
        $vendedor=Vendedor::orderBy('nombre_vendedor','ASC')->pluck('nombre_vendedor','id')->prepend('Vendedor');
        $descuento=Descuento_Cliente::orderBy('descuento_cliente','ASC')->pluck('descuento_cliente','id')->prepend('Descuento');
        $cliente=Cliente::orderBy('nombre','ASC')->pluck('nombre','id')->prepend('Nombre Cliente');
        $Tipo=Tipo_Factura::orderBy('tipo_factura_nombre','ASC')->pluck('tipo_factura_nombre','id')->prepend('Tipo Factura');
        return view('admin.venta.create')->with('Tipo',$Tipo)->with('cliente',$cliente)->with('descuento',$descuento)->with('vendedor',$vendedor)
        ->with('categoria',$categoria)->with('producto',$producto)->with('productos',$productos);
    }

    public function report($id){
        $facturaventa=Factura_venta::find($id);
        $facturaventa->each(function($facturaventa){
            $facturaventa->clientes;
            $facturaventa->descuentos_clientes;
            $facturaventa->vendedores;
            $facturaventa->productos;
            $facturaventa->tipos_factura;
        });
        $detalle=DB::table('factura_producto_venta as fac')
        ->join('productos as p', 'fac.producto_id','=','p.id')
        ->join('facturas_ventas as f','fac.venta_id','=','f.id')
        ->select('p.descripcion','fac.cantidad','fac.precio','fac.total')
        ->where('fac.venta_id','=',$id)
        ->get();
/*        $pdf=PDF::loadView('admin.venta.report',['facturaventa'=>$facturaventa,'detalle'=>$detalle]);
        $fileName='factura Nº '.$facturaventa->id;
        return $pdf->stream($fileName.'.pdf');*/
       return view('admin.venta.report')->with('facturaventa',$facturaventa)->with('detalle',$detalle);
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
                    $detalle->producto_id=$request->marca_id[$i];
                    
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
