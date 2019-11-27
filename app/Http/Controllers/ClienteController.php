<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Cliente;

class ClienteController extends Controller
{
    public function index(){
        $cliente=Cliente::orderBy('id','ASC')->paginate(3);
        return view('admin.cliente.index')->with('cliente',$cliente);
        
    }
}
