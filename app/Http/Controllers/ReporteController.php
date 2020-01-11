<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;
use App\Factura_Compra;
use App\Factura_Venta;
use PDF;
use Carbon\Carbon;
class ReporteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function compra(Request $request){
        
        $facturacompra=Factura_Compra::codigo($request->codigo)->orderBy('id','DESC')
        ->estado($request->estado)
        ->fecha($request->fecha)
        ->get();
        $facturacompra->each(function($facturacompra){
            $facturacompra->producto;
            $facturacompra->proveedores;
            $facturacompra->tipoFactura;
        });

        return view('admin.reportes.compra')->with('facturacompra',$facturacompra);

    }

    public function producto(Request $request){
        $productos=Producto::codigo($request->codigo)->orderBy('id','ASC')
        ->descripcion($request->descripcion)
        ->estante($request->estante)
        ->get();
        $productos->each(function($productos){
            $productos->categoria;
            $productos->marca;
            $productos->proveedor;
        });
        return view('admin.reportes.producto')->with('productos',$productos);
    }

    public function venta(Request $request){
        $productos=Producto::orderBy('id','ASC')->get();
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
        return view('admin.reportes.venta')->with('venta',$venta)->with('productos',$productos);
    }

    public function reportCompra(Request $request){

        if($request->inicio && $request->fin != null){
            $facturacompra=Factura_Compra::orderBy('id','DESC')
            ->intervalo($request->inicio,$request->fin)
            ->fecha($request->fecha)
            ->codigo($request->codigo)
            ->estado($request->estado)
            ->get();
        }else{

            $facturacompra=Factura_Compra::orderBy('id','DESC')
            ->fecha($request->fecha)
            ->codigo($request->codigo)
            ->estado($request->estado)
            ->get();
        }
        $facturacompra->each(function($facturacompra){
            $facturacompra->producto;
            $facturacompra->proveedores;
            $facturacompra->tipoFactura;
        });
        
        $timestamp = Carbon::now('-6:00');
        $dia = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'America/Managua');
        $dia->setTimezone('America/Managua');
        $pdf=PDF::loadView('admin.reportes.reportsCompra',['facturacompra'=>$facturacompra,'dia'=>$dia]);
        $fileName='reportes_compra' .Carbon::Now();
        return $pdf->stream($fileName.'.pdf');

//        return view('admin.reportes.reportsCompra')->with('facturacompra',$facturacompra)->with('dia',$dia);
    }

    public function reportsProduc(Request $request){
        $productos=Producto::orderBy('id','ASC')
        ->codigo($request->codigo)  
        ->descripcion($request->descripcion)
        ->estante($request->estante)
        ->get();
        $productos->each(function($productos){
            $productos->categoria;
            $productos->marca;
            $productos->proveedor;
        });
        $timestamp = Carbon::now('-6:00');
        $dia = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'America/Managua');
        $dia->setTimezone('America/Managua');
        $pdf=PDF::loadView('admin.reportes.reporteProduct',['productos'=>$productos,'dia'=>$dia])->setPaper('A4', 'landscape');;
        $fileName='reporte_productos '. Carbon::now();
        return $pdf->stream($fileName.'.pdf');
    }
    
    public function reporteVenta(Request $request){

        if($request->inicio && $request->fin != null){
            $venta= Factura_Venta::orderBy('id','DESC')
            ->codigo($request->codigo)
            ->fecha($request->fecha)
            ->estado($request->estado)
            ->intervalo($request->inicio,$request->fin)
            ->get();
        }else{
            $venta= Factura_Venta::orderBy('id','DESC')
            ->codigo($request->codigo)
            ->fecha($request->fecha)
            ->estado($request->estado)
            ->get();            
        }
        $venta->each(function($venta){
            $venta->clientes;
            $venta->descuentos_clientes;
            $venta->vendedores;
            $venta->productos;
        });
        
        $timestamp = Carbon::now('-6:00');
        $dia = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'America/Managua');
        $dia->setTimezone('America/Managua');
        $pdf=PDF::loadView('admin.reportes.reportsVenta',['venta'=>$venta,'dia'=>$dia]);
        $fileName='reportes_venta' .Carbon::Now();
        return $pdf->stream($fileName.'.pdf');
        //return view('admin.compra.report')->with('facturacompra',$facturacompra)->with('detalleFact',$detalleFact);
    }


}
