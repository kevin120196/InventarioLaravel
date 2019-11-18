<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Cliente;

class ClienteController extends Controller
{
    public function showClientes($id){
        $cliente = Cliente::all;
        return view([]);
    }
}
