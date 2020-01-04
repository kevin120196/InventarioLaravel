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
            $facturacompra=Factura_Compra::codigo($request->codigo)->orderBy('id','ASC')
            ->estado($request->estado)
            ->fecha($request->fecha)
            ->intervalo($request->inicio,$request->fin)
            ->paginate(3);
        }else{
            $facturacompra=Factura_Compra::codigo($request->codigo)->orderBy('id','ASC')
            ->estado($request->estado)
            ->fecha($request->fecha)
            ->paginate(3);
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
        ->select('p.descripcion','fac.cantidad','fac.precio','fac.total')
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
        
        $proveedor=Proveedor::orderBy('nombre_proveedor','ASC')->pluck('nombre_proveedor','id')->prepend('Proveedor');
        $producto=Producto::orderBy('descripcion','ASC')->pluck('descripcion','id')->prepend('Producto');
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
        ->select('p.descripcion','fac.cantidad','fac.precio','fac.total')
        ->where('fac.facturas_compras_id','=',$id)
        ->get();
        $timestamp = Carbon::now('-6:00');
        $dia = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'America/Managua');
        $dia->setTimezone('America/Managua');
        $pdf=PDF::loadView('admin.compra.report',['dia'=>$dia,'facturacompra'=>$facturacompra,'detalleFact'=>$detalleFact]);
        $fileName=$facturacompra->productos_id_productos;
        return $pdf->stream($fileName.'.pdf');
        //return view('admin.compra.report')->with('facturacompra',$facturacompra)->with('detalleFact',$detalleFact);
    }

    public function reports(Request $request){
        $facturacompra=Factura_Compra::orderBy('id','ASC')
        ->get();

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


   public function store(request $request){
        $compra= new Factura_Compra();
        DB::beginTransaction();
        try {
            $compra->totalgeneral=$request->totalgeneral;
            $compra->fecha_compra=$request->fecha_compra;
            $compra->estado_factura=$request->estado_factura;
            $compra->tipo_factura_id=$request->tipo_factura_id;
            $compra->proveedores_id=$request->proveedores_id;
            $contador=count(request()->productos_id_productos);
            $compra->save();

            for ($i=0; $i < $contador; $i++) { 
                # code...
                $detalle=new Detalle_Factura_Compra();
                
                $detalle->cantidad=$request->cantidad[$i];
                $detalle->precio=$request->precio[$i];
                $detalle->total=$request->total[$i];
                $detalle->facturas_compras_id=$compra->id;
                $detalle->productos_id_productos=$request->productos_id_productos[$i];
                $detalle->save();
            }
            DB::commit();
            Alert::success('Exito!','La compra '.$compra->id .' ha sido realizada de forma Correcta!!');

            if (\Auth::user()->type()=='Gerente'){
                return redirect()->route('compra.index');
            
            }else{
                return redirect()->route('compras.index');
            }

            
    
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            DB::rollBack();
        }
    }

    public function destroy($id)
    {
     $venta=Factura_Compra::findOrFail($id);
        $venta->estado_factura='Anulada';
        $venta->update();
        Alert::error('Exito!','La Factura '.$venta->id .' ha sido anulada de forma Correcta!!');
        return redirect()->route('compra.index');
    }

    public function devol($id)
    {
     $venta=Factura_Compra::findOrFail($id);
        $venta->estado_factura='devolución';
        $venta->update();
        Alert::error('Exito!','La Factura '.$venta->id .' ha pasado a ser una devolución de forma Correcta!!');
        return redirect()->route('compra.index');
    }
}
