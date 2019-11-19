<?php

namespace App\Http\Controllers;
use app\Proforma;
use Illuminate\Http\Request;

class ProformaController extends Controller
{
    public function index(){
        $proforma=Proforma::orderBy('id','ASC')->paginate(3);
        return view('admin.proforma.index')->with('proforma',$proforma);
        
    }
}
