<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    //

    public function index(){
        $categoria=Categoria::orderBy('id','ASC')->paginate(3);
        return view('admin.categoria.index')->with('categoria',$categoria);
        
    }
}
