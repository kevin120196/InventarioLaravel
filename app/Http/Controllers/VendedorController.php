<?php

namespace App\Http\Controllers;
use app\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index(){
        $vendedor=Vendedor::orderBy('id','ASC')->paginate(3);
        return view('admin.vendedor.index')->with('vendedor',$vendedor);
        
    }
}
