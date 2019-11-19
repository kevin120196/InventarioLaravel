<?php

namespace App\Http\Controllers;
use app\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index(){
        $marca=Marca::orderBy('id','ASC')->paginate(3);
        return view('admin.marca.index')->with('marca',$marca);
        
    }

    public function create(){
        return view('admin.marca.create');

    }

    public function store(Request $reques){
        $marca=new Marca($reques->all());
        $marca->save();
        Alert::success('Exito!','La marca ' . $marca->nombre_marca . ' ha sido creada con exito' );
        //flash('La categoria' . $categoria->nombre_categoria . ' ha sido creada con exito', 'success');
        return redirect()->route('marca.index');
    }

    public function edit($id){
        $marca=Marca::find($id);
        return view('admin.marca.edit')->with('marca',$marca);
    }

    public function update(Request $request,$id){
        $marca=Marca::find($id);
        $marca->fill($request->all());
        $marca->save();
        Alert::success('Exito!','La marca ' .$marca->nombre_marca. ' ha sido actualizado');
        return redirect()->route('marca.index');
    }

    public function destroy($id){
        $marca=Marca::find($id);
        $marca->delete();
        Alert::error('Eliminado!', 'La categoria ' .$marca->nombre_marca. ' ha sido eliminada');
        return redirect()->route('categorias.index');
    }
}
