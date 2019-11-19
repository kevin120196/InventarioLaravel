<?php

namespace App\Http\Controllers;
use app\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index(){
        $factur=Factura::orderBy('id','ASC')->paginate(3);
        return view('admin.factura.index')->with('factura',$factura);
        
    }
}
