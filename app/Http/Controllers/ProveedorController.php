<?php

namespace App\Http\Controllers;
use app\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(){
        $proveedor=Proveedor::orderBy('id','ASC')->paginate(3);
        return view('admin.proveedor.index')->with('proveedor',$proveedor);
        
    }
}
