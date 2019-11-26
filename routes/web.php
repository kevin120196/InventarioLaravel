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

//ruta administracion pale
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


