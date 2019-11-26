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
   /* Route::resource('descuentos_clientes','DescuentoClienteController');
    Route::get('admin/descuento_cliente/{id}/destroy',[
        'uses'=>'DescuentoClienteController@destroy',
        'as'=>'admin.descuentos_clientes.destroy'
    ]);

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

});


