<?php

namespace App\Http\Controllers;
use app\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index(){
        $productos=Productos::orderBy('id','ASC')->paginate(3);
        return view('admin.productos.index')->with('productos',$productos);
        
    }
}
