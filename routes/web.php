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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function(){
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

});

Route::group(['prefix'=>'admin'],function(){
    Route::resource('marcas','MarcaController');
    Route::get('admin/marca/{id}/destroy',[
        'uses'=>'MarcaController@destroy',
        'as'=>'admin.marca.destroy'
    ]);
});

Route::group(['prefix'=>'admin'],function(){
    Route::resource('descuentos_clientes','DescuentoClienteController');
    Route::get('admin/descuento_cliente/{id}/destroy',[
        'uses'=>'DescuentoClienteController@destroy',
        'as'=>'admin.descuentos_clientes.destroy'
    ]);
});

Route::group(['prefix'=>'admin'],function(){
    Route::resource('estados_facturas','EstadoFacturaController');
    Route::get('admin/estados_facturas/{id}/destroy',[
        'uses'=>'EstadoFactura@destroy',
        'as'=>'admin.estados_facturas.destroy'
    ]);
});
