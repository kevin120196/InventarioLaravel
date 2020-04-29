<?php

namespace App\Http\Controllers;
use App\Marca; //levi siempre tiene que ir en mayuscula el App porque es donde estan los modelos fujate como esta escrito
use Illuminate\Http\Request;
use App\Http\Requests\marcaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class MarcaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $marca=Marca::orderBy('id','ASC')->paginate(3);
        return view('admin.marca.index')->with('marca',$marca);
        
    }

    public function create(){
        return view('admin.marca.create');

    }

    public function store(marcaRequest $reques){
        $marca=new Marca($reques->all());
        $marca->save();
        Alert::success('Exito!','La marca ' . $marca->nombre_marca . ' ha sido creada con exito' );
        //flash('La categoria' . $categoria->nombre_categoria . ' ha sido creada con exito', 'success');
        return redirect()->route('marcas.index');
    }

    public function edit($id){
        $marca=Marca::find($id);
        return view('admin.marca.edit')->with('marca',$marca);
    }

    public function update(marcaRequest $request,$id){
        $marca=Marca::find($id);
        $marca->fill($request->all());
        $marca->save();
        Alert::success('Exito!','La marca ' .$marca->nombre_marca. ' ha sido actualizado');
        return redirect()->route('marcas.index');
    }

    public function destroy($id){
        $marca=Marca::find($id);
        $marca->delete();
        Alert::error('Eliminado!', 'La marca ' .$marca->nombre_marca. ' ha sido eliminada');
        return redirect()->route('marcas.index');
    }
}
