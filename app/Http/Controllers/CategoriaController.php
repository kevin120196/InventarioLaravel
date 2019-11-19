<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use RealRashid\SweetAlert\Facades\Alert;


class CategoriaController extends Controller
{
    //

    public function index(){
        $categoria=Categoria::orderBy('id','ASC')->paginate(3);
        return view('admin.categoria.index')->with('categoria',$categoria);
        
    }

    public function store(){
        return view('admin.categoria.create');

    }

    public function create(Request $reques){
        $categoria=new Categoria($reques->all());
        $categoria->save();
        Alert::success('Exito!','La categoria ' . $categoria->nombre_categoria . ' ha sido creada con exito' );
        //flash('La categoria' . $categoria->nombre_categoria . ' ha sido creada con exito', 'success');
        return redirect()->route('categorias.index');
    }

    public function edit($id){
        $categoria=Categoria::find($id);
        return view('admin.categoria.edit')->with('categoria',$categoria);
    }

    public function update(Request $request,$id){
        $categoria=Categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();
        Alert::success('Exito!','La categoria ' .$categoria->nombre_categoria. ' ha sido actualizado');
        return redirect()->route('categorias.index');
    }

    public function destroy($id){
        $categoria=Categoria::find($id);
        $categoria->delete();
        Alert::error('Eliminado!', 'La categoria ' .$categoria->nombre_categoria. ' ha sido eliminada');
        return redirect()->route('categorias.index');
    }

}
