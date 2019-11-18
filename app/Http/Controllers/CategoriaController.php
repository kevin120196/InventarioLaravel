<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Laracasts\Flash\Flash;

class CategoriaController extends Controller
{
    //

    public function index(){
        $categoria=Categoria::orderBy('id','ASC')->paginate(3);
        return view('admin.categoria.index')->with('categoria',$categoria);
        
    }

    public function create(){
        return view('admin.categoria.create');

    }

    public function store(Request $reques){
        $categoria=new Categoria($reques->all());
        $categoria->save();
        //flash('La categoria' . $categoria->nombre_categoria . ' ha sido creada con exito', 'success');
        return redirect()->route('categorias.index');
    }


}
