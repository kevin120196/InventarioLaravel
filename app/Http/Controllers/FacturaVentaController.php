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
use App\Http\Requests\ventaRequest;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
class FacturaVentaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if($request->inicio && $request->fin != null){
            $productos=Producto::orderBy('id','ASC')->paginate(5);
            $venta= Factura_Venta::orderBy('id','DESC')
            ->codigo($request->codigo)
            ->fecha($request->fecha)
            ->estado($request->estado)
            ->intervalo($request->inicio,$request->fin)
            ->paginate(10);            
        }else{
            $productos=Producto::orderBy('id','ASC')->paginate(5);
            $venta= Factura_Venta::orderBy('id','DESC')
            ->codigo($request->codigo)
            ->fecha($request->fecha)
            ->estado($request->estado)
            ->paginate(10);
            
        }

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
        ->join('productos as p', 'fac.productos_id','=','p.id')
        ->join('facturas_ventas as f','fac.ventas_id','=','f.id')
        ->select('p.descripcion','fac.cantidad','fac.precio','fac.subtotal','fac.iva')
        ->where('fac.ventas_id','=',$id)
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
        $producto=Producto::orderBy('id','ASC')->get();
        $vendedor=Vendedor::orderBy('id','ASC')->get();
        $descuento=Descuento_Cliente::orderBy('id','ASC')->get();
        $cliente=Cliente::orderBy('id','ASC')->get();
        $Tipo=Tipo_Factura::orderBy('tipo_factura_nombre','ASC')->pluck('tipo_factura_nombre','id')->prepend('Tipo Factura');
        return view('admin.venta.create')->with('Tipo',$Tipo)->with('cliente',$cliente)->with('descuento',$descuento)->with('vendedor',$vendedor)
        ->with('categoria',$categoria)->with('producto',$producto)->with('productos',$productos);
    }

    public function report(Request $request,$id){
        
        $facturaventa=Factura_venta::find($id);
        $facturaventa->each(function($facturaventa){
            $facturaventa->clientes;
            $facturaventa->descuentos_clientes;
            $facturaventa->vendedores;
            $facturaventa->productos;
            $facturaventa->tipos_factura;
        });
        $detalle=DB::table('factura_producto_venta as fac')
        ->join('productos as p', 'fac.productos_id','=','p.id')
        ->join('facturas_ventas as f','fac.ventas_id','=','f.id')
        ->select('p.descripcion','fac.cantidad','fac.precio','fac.subtotal','fac.iva')
        ->where('fac.ventas_id','=',$id)
        ->get();
        $timestamp = Carbon::now('-6:00');
        $dia = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'America/Managua');
        $dia->setTimezone('America/Managua');
        $pdf=PDF::loadView('admin.venta.report',['facturaventa'=>$facturaventa,'detalle'=>$detalle,'dia'=>$dia]);
        $fileName='factura Nº '.$facturaventa->id;
        if($facturaventa->estado_impreso==0){
            $facturaventa->estado_impreso=1;
            $facturaventa->update();
            return $pdf->stream($fileName.'.pdf');

        }else{
            \Session::flash('message', 'La Factura '.$facturaventa->codigo_factura. ' ya fue impresa');
            return redirect()->route('ventas.index');
        }
       
//       return view('admin.venta.report')->with('facturaventa',$facturaventa)->with('detalle',$detalle);
    }

    public function reports(){
        $venta= Factura_Venta::orderBy('id','DESC')
        ->get();
        $venta->each(function($venta){
            $venta->clientes;
            $venta->descuentos_clientes;
            $venta->vendedores;
            $venta->productos;
        });
        $pdf=PDF::loadView('admin.venta.reports',['venta'=>$venta]);
        $fileName='reportes_venta' .Carbon::Now();
        return $pdf->stream($fileName.'.pdf');
        //return view('admin.compra.report')->with('facturacompra',$facturacompra)->with('detalleFact',$detalleFact);
    }

    public function store(ventaRequest $request){
        $venta=new Factura_Venta();
        
        DB::beginTransaction();
        try {
                $venta->codigo_factura=$request->codigo_factura;
                $venta->fecha_factura=$request->fecha_factura;
                $venta->tipos_factura_id=$request->tipos_factura_id;
                $venta->estado_factura=$request->estado_factura;
                $venta->clientes_id=$request->clientes_id;
                $venta->descuentos_clientes_id=$request->descuentos_clientes_id;
                $venta->vendedores_id=$request->vendedores_id;        
                $venta->total=$request->total;
                $venta->estado_impreso=0;
                $contador= count(request()->productos_id);
                $venta->save();
                //dd($request->producto_cantidad_id[0]);
                
                for ($i=0; $i < $contador; $i++) { 
                    # code...
                    
                    $detalle=new Detalle_Factura_Venta();
                    $detalle->cantidad=$request->cantidad[$i];
                    $detalle->precio=$request->precio[$i];
                    $detalle->iva=$request->iva[$i];
                    $detalle->subtotal=$request->subtotal[$i];
                    $detalle->ventas_id=$venta->id;
                    $detalle->productos_id=$request->productos_id[$i];
                    
                $detalle->save();
                }
                DB::commit();
               return $this->report($venta->id);
              Alert::success('Exito!','La venta '.$venta->id .' ha sido realizada de forma Correcta!!');
  
                //return redirect()->route('ventas.index');
                
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Error!',$th);
            DB::rollBack();
        }

        
    }

    public function destroy($id)
    {
     $venta=Factura_Venta::findOrFail($id);
<<<<<<< HEAD
        if($venta->estado_factura=="Anulada"||$venta->estado_factura=="Devolución"){
            if ($venta->estado_factura=="Devolución") {
                \Session::flash('message', 'Esta factura anteriormente fue realizada su devolución');
                return redirect()->route('ventas.index');

            }else{
                \Session::flash('message', 'La Factura '.$venta->codigo_factura. ' ya se realizo su Anulación');
=======
        if($venta->estado_factura=="Anulada"){
            if ($venta->estado_factura=="Devolucion") {
                \Session::flash('message', 'La Factura '.$venta->codigo_factura. ' ya se realizo su devolución por lo que ya no puede pasar a Anulada');
                return redirect()->route('ventas.index');

            }else{
                \Session::flash('message', 'La Factura '.$venta->codigo_factura. ' ya se realizo su devolucion');
>>>>>>> 5f028c4b171b772bedb241d2c15fae884c29fc9c
                return redirect()->route('ventas.index');
            }

        }else{
            $venta->estado_factura='Anulada';
            $venta->update();
            Alert::error('Exito!','La Factura '.$venta->id .' ha sido anulada de forma Correcta!!');
            return redirect()->route('ventas.index');

        }
    }

    public function devol($id)
    {        
        $venta=Factura_Venta::findOrFail($id);

<<<<<<< HEAD
        if($venta->estado_factura=="Devolución"||$venta->estado_factura=="Anulada"){
            if ($venta->estado_factura=="Anulada") {
                \Session::flash('message', 'Esta factura anteriormente fue anulada');
                return redirect()->route('ventas.index');

            }else{
                \Session::flash('message', 'La Factura '.$venta->codigo_factura. ' ya se realizo su devolución');
=======
        if($venta->estado_factura=="Devolucion"){
            if ($venta->estado_factura=="Anulada") {
                \Session::flash('message', 'La Factura '.$venta->codigo_factura. ' ya se realizo su devolución por lo que ya no puede pasar a Anulada');
                return redirect()->route('ventas.index');

            }else{
                \Session::flash('message', 'La Factura '.$venta->codigo_factura. ' ya se realizo su devolucion');
>>>>>>> 5f028c4b171b772bedb241d2c15fae884c29fc9c
                return redirect()->route('ventas.index');
            }

        }else{
<<<<<<< HEAD
            $venta->estado_factura='Devolución';
=======
            $venta->estado_factura='devolución';
>>>>>>> 5f028c4b171b772bedb241d2c15fae884c29fc9c
            $venta->update();
            Alert::error('Exito!','La Factura '.$venta->id .' ha pasado a ser una devolución de forma Correcta!!');
            return redirect()->route('ventas.index');
    
        }
    }
}
