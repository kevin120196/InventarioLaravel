<?php

namespace App\Http\Controllers;
use App\Factura_Compra;
use App\Tipo_Factura;
use App\Proveedor;
use App\Categoria;
use App\Detalle_Factura_Compra;
use App\Marca;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\comprasRequest;
use DB;
use PDF;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
class FacturaCompraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index(Request $request){
        

        if($request->inicio && $request->fin != null){
            $facturacompra=Factura_Compra::codigo($request->codigo)->orderBy('id','DESC')
            ->estado($request->estado)
            ->fecha($request->fecha)
            ->intervalo($request->inicio,$request->fin)
            ->paginate(10);
        }else{
            $facturacompra=Factura_Compra::codigo($request->codigo)->orderBy('id','DESC')
            ->estado($request->estado)
            ->fecha($request->fecha)
            ->paginate(10);
        }


        $facturacompra->each(function($facturacompra){
            $facturacompra->producto;
            $facturacompra->proveedores;
            $facturacompra->tipoFactura;
        });

            return view('admin.compra.index')->with('facturacompra',$facturacompra);


        
    }

    public function details(Request $request){

        return view('admin.compra.details');
    }

    public function show($id){
        $facturacompra=Factura_Compra::find($id);
        $facturacompra->each(function($facturacompra){
            $facturacompra->producto;
            $facturacompra->proveedores;
            $facturacompra->tipoFactura;
        });

        $detalleFact=DB::table('factura_producto_compra as fac')
        ->join('productos as p', 'fac.productos_id_productos','=','p.id')
        ->join('facturas_compras as f','fac.facturas_compras_id','=','f.id')
        ->select('p.descripcion','fac.cantidad','fac.precio','fac.subtotal')
        ->where('fac.facturas_compras_id','=',$id)
        ->get();

        return view('admin.compra.show')->with('facturacompra',$facturacompra)->with('detalleFact',$detalleFact);
    }

    public function getProductos(Request $request){
        $producto=DB::table('productos')
        ->where('proveedores_id',$request->proveedores_id)
        ->pluck('descripcion','id');
        return response()->json($producto);
    }
    public function create(){
        $productos=Producto::orderBy('id','ASC')
        ->paginate(10);
        $productos->each(function($productos){
            $productos->categoria;
            $productos->marca;
            $productos->proveedor;
        });
        
        $proveedor=Proveedor::orderBy('id','ASC')->get();
        $producto=Producto::orderBy('id','ASC')->get();
        $Tipo=Tipo_Factura::orderBy('tipo_factura_nombre','ASC')->pluck('tipo_factura_nombre','id')->prepend('Tipo Factura');
        return view('admin.compra.create')->with('Tipo',$Tipo)->with('proveedor',$proveedor)->with('producto',$producto)->with('productos',$productos);
    }

    public function report($id){
        $facturacompra=Factura_compra::find($id);
        $facturacompra->each(function($facturacompra){
            $facturacompra->producto;
            $facturacompra->proveedores;
            $facturacompra->tipoFactura;
        });
        $detalleFact=DB::table('factura_producto_compra as fac')
        ->join('productos as p', 'fac.productos_id_productos','=','p.id')
        ->join('facturas_compras as f','fac.facturas_compras_id','=','f.id')
        ->select('p.descripcion','fac.cantidad','fac.precio','fac.subtotal')
        ->where('fac.facturas_compras_id','=',$id)
        ->get();
        $timestamp = Carbon::now('-6:00');
        $dia = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'America/Managua');
        $dia->setTimezone('America/Managua');
        $pdf=PDF::loadView('admin.compra.report',['dia'=>$dia,'facturacompra'=>$facturacompra,'detalleFact'=>$detalleFact]);
        $fileName='Factura Nº'.$facturacompra->id;
        if($facturacompra->estado_impreso==0){
            $facturacompra->estado_impreso=1;
            $facturacompra->update();
            return $pdf->stream($fileName.'.pdf');
        }else{
            \Session::flash('message', 'La Factura '.$facturacompra->codigo_factura. ' ya fue impresa');
            return redirect()->route('compra.index');
        }
       
        //return view('admin.compra.report')->with('facturacompra',$facturacompra)->with('detalleFact',$detalleFact);
    }

    public function reports(Request $request){
        $facturacompra=Factura_Compra::orderBy('id','ASC')->get();
        $facturacompra->each(function($facturacompra){
            $facturacompra->producto;
            $facturacompra->proveedores;
            $facturacompra->tipoFactura;
        });
        $pdf = \App::make('dompdf.wrapper');
        $pdf=PDF::loadView('admin.compra.reports',['facturacompra'=>$facturacompra]);
        $fileName='reportes_compra' .Carbon::Now();
        return $pdf->stream($fileName.'.pdf');

        //        return view('admin.compra.reports')->with('facturacompra',$facturacompra);
    }


   public function store(comprasRequest $request){
        $compra= new Factura_Compra();
        DB::beginTransaction();
        try {
            $compra->codigo_factura=$request->codigo_factura;
            $compra->total=$request->total;
            $compra->fecha_compra=$request->fecha_compra;
            $compra->estado_factura=$request->estado_factura;
            $compra->tipo_factura_id=$request->tipo_factura_id;
            $compra->proveedores_id=$request->proveedores_id;
            $compra->estado_impreso=0;
            $contador=count(request()->productos_id_productos);
            $compra->save();

            for ($i=0; $i < $contador; $i++) { 
                # code...
                $detalle=new Detalle_Factura_Compra();
                
                $detalle->cantidad=$request->cantidad[$i];
                $detalle->precio=$request->precio[$i];
                $detalle->subtotal=$request->subtotal[$i];
                $detalle->facturas_compras_id=$compra->id;
                $detalle->productos_id_productos=$request->productos_id_productos[$i];
                $detalle->save();
            }
            DB::commit();
            $facturacompra=Factura_compra::find($compra->id);
            $facturacompra->each(function($facturacompra){
                $facturacompra->producto;
                $facturacompra->proveedores;
                $facturacompra->tipoFactura;
            });
            $detalleFact=DB::table('factura_producto_compra as fac')
            ->join('productos as p', 'fac.productos_id_productos','=','p.id')
            ->join('facturas_compras as f','fac.facturas_compras_id','=','f.id')
            ->select('p.descripcion','fac.cantidad','fac.precio','fac.subtotal')
            ->where('fac.facturas_compras_id','=',$compra->id)
            ->get();
            $timestamp = Carbon::now('-6:00');
            $dia = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'America/Managua');
            $dia->setTimezone('America/Managua');
            $pdf=PDF::loadView('admin.compra.report',['dia'=>$dia,'facturacompra'=>$facturacompra,'detalleFact'=>$detalleFact]);
            $fileName='Factura Nº'.$facturacompra->id;
            return $pdf->stream($fileName.'.pdf');
                //Alert::success('Exito!','La compra '.$compra->id .' ha sido realizada de forma Correcta!!');
            //return redirect()->route('compra.index');
            

            
    
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Error!','Estimado usuario su Compra no se realizó de forma correcta.');
            return redirect()->route('compra.index');
            DB::rollBack();
        }
    }

    public function destroy($id)
    {
     $compra=Factura_Compra::findOrFail($id);
        
        $stockFactura=DB::table('factura_producto_compra as fa')
        ->join('productos as p','p.id','=','fa.productos_id_productos')
        ->join('facturas_compras as com','com.id','=','fa.facturas_compras_id')
        ->where('fa.facturas_compras_id','=',$compra->id)
        ->select('fa.cantidad as stockfa')->get();
        $stockproductos=DB::table('productos as p')
        ->join('factura_producto_compra as fa','fa.productos_id_productos','=','p.id')
        ->join('facturas_compras as com','com.id','=','fa.facturas_compras_id')
        ->where('fa.facturas_compras_id','=',$compra->id)
        ->select('p.cantidad as stock')->get();
        $resta=0;
        if($compra->estado_factura=="Anulada" || $compra->estado_factura=="Devolución"){
       
            if ($compra->estado_factura=="Devolución") {
                \Session::flash('message', 'Esta factura anteriormente fue realizada su devolución');
                return redirect()->route('compra.index');

            }else{
                \Session::flash('message', 'La Factura '.$compra->codigo_factura. ' ya fue anulada');
                return redirect()->route('compra.index');

            }    
            
        }else{

            for ($i=0; $i <= $stockproductos->count(); $i++) { 
                $resta=$stockproductos[$i++]->stock-$stockFactura[$i++]->stockfa;
                if ($resta<0) {
                    \Session::flash('message', 'Esta Compra no se puede devolver porque supera la existencia del Producto en inventario');
                    return redirect()->route('compra.index');        
                }else{
                    $compra->estado_factura='Anulada';
                    $compra->estado_impreso=0;
                    $compra->update();
                    Alert::error('Exito!','La Factura '.$compra->codigo_factura .' ha pasado a devolución de forma Correcta!!');
                    return redirect()->route('compra.index');                      
                }                
            }
        }



    }

    public function devol($id)
    {
     $compra=Factura_Compra::findOrFail($id);
     $stockFactura=DB::table('factura_producto_compra as fa')
     ->join('productos as p','p.id','=','fa.productos_id_productos')
     ->join('facturas_compras as com','com.id','=','fa.facturas_compras_id')
     ->where('fa.facturas_compras_id','=',$compra->id)
     ->select('fa.cantidad as stockfa')->get();
     $stockproductos=DB::table('productos as p')
     ->join('factura_producto_compra as fa','fa.productos_id_productos','=','p.id')
     ->join('facturas_compras as com','com.id','=','fa.facturas_compras_id')
     ->where('fa.facturas_compras_id','=',$compra->id)
     ->select('p.cantidad as stock')->get();
     $resta=0;

     if($compra->estado_factura=="Devolución" || $compra->estado_factura=="Anulada"){
            if ($compra->estado_factura=="Anulada") {
                \Session::flash('message', 'Esta factura anteriormente fue anulada');
                return redirect()->route('compra.index');

            }else{
                \Session::flash('message', 'La Factura '.$compra->codigo_factura. ' ya se realizo su devolución');
                return redirect()->route('compra.index');
            }
    
        }else{
            for ($i=0; $i <= $stockproductos->count(); $i++) { 
                $resta=$stockproductos[$i++]->stock-$stockFactura[$i++]->stockfa;
                if ($resta<0) {
                    \Session::flash('message', 'Esta Compra no se puede devolver porque supera la existencia del Producto en inventario');
                    return redirect()->route('compra.index');        
                }else{
                    $compra->estado_factura='Anulada';
                    $compra->estado_impreso=0;
                    $compra->update();
                    Alert::error('Exito!','La Factura '.$compra->codigo_factura .' ha sido anulada de forma Correcta!!');
                    return redirect()->route('compra.index');                    
                }                
            }
        }
        
    }
}
