<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/admin', 'HomeController@index')->name('home');
//Auth::Routes();
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login');
//Auth::logout();
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@register')->name('register');

Route::get('/admin', 'HomeController@index')->name('home');
//Auth::Routes();
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login');
//Auth::logout();
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@register')->name('register');

Route::group(['prefix'=>'admin'],function(){

    
	Route::get('/',['as'=>'admin.index', function () {
        return view('welcome');
    }]);
    

    Route::resource('usuarios','UsersController');
    Route::get('admin/usuarios/{id}/destroy',[
        'uses'=>'UsersController@destroy',
        'as'=>'admin.usuarios.destroy'
    ]);

    Route::resource('categorias','CategoriaController');
    Route::get('admin/categoria/{id}/destroy',[
        'uses'=>'CategoriaController@destroy',
        'as'=>'admin.categorias.destroy'
    ]);

    Route::resource('proveedores','ProveedorController');
        Route::get('admin/proveedor/{id}/destroy',[
        'uses'=>'ProveedorController@destroy',
        'as'=>'admin.proveedores.destroy'
    ]);

    Route::resource('marcas','MarcaController');
    Route::get('admin/marcas/{id}/destroy',[
        'uses'=>'MarcaController@destroy',
        'as'=>'admin.marcas.destroy'
    ]);
   Route::resource('descuentos','DescuentoClienteController');
    Route::get('admin/descuentos/{id}/destroy',[
        'uses'=>'DescuentoClienteController@destroy',
        'as'=>'admin.descuentos.destroy'
    ]);
/* 
    Route::resource('estados_facturas','EstadoFacturaController');
    Route::get('admin/estados_facturas/{id}/destroy',[
        'uses'=>'EstadoFactura@destroy',
        'as'=>'admin.estados_facturas.destroy'
    ]);*/
    Route::get('admin/proveedor/{id}/show',[
        'uses'=>'ProveedorController@show',
        'as'=>'admin.proveedores.show'
    ]);

    Route::resource('productos','ProductosController');
    Route::get('admin/producto/{id}/destroy',[
        'uses'=>'ProductosController@destroy',
        'as'=>'admin.productos.destroy'
    ]);

    Route::resource('cliente','ClienteController');
    Route::get('admin/cliente/{id}/destroy',[
        'uses'=>'ClienteController@destroy',
        'as'=>'admin.clientes.destroy'
    ]);

    Route::resource('ventas','FacturaVentaController');
    Route::resource('compra','FacturaCompraController');
    Route::get('admin/compra/{id}/report',[
        'uses'=>'FacturaCompraController@report',
        'as'=>'admin.compra.report'
    ]);
    Route::resource('detalleVenta','DetalleFacturaVentaController');
});


