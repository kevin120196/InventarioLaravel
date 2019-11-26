<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Alert::success('Exito!', 'Estimado Usuario a iniciado sesión de forma Correcta!!');
        return view('admin');
        
    }
}
