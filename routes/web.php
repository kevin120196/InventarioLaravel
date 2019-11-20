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
