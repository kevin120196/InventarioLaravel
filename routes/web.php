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


Route::get('/admin', 'HomeController@index')->name('admin');
//Auth::Routes();
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login');
//Auth::logout();
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@register')->name('register');
//Auth::Routes();
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login');
//Auth::logout();
Route::get('/', function(){
    return view('auth.login');
});
Route::get('logout','Auth\LoginController@logout')->name('logout');
Route::post('logout','Auth\LoginController@logout')->name('logout');
Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@register')->name('register');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    
	Route::get('/',['as'=>'admin.index', function () {
        return view('welcome');
    }]);

    Route::group(['middleware'=>'Gerente'],function(){

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

        Route::get('admin/proveedor/{id}/show',[
            'uses'=>'ProveedorController@show',
            'as'=>'admin.proveedores.show'
        ]);

        Route::resource('vendedores','VendedorController');
        Route::get('admin/vendedores/{id}/destroy',[
            'uses'=>'VendedorController@destroy',
            'as'=>'admin.vendedores.destroy'
        ]);
        Route::resource('cliente','ClienteController');
        Route::get('admin/cliente/{id}/destroy',[
            'uses'=>'ClienteController@destroy',
            'as'=>'admin.clientes.destroy'
        ]);


        //productos

        Route::resource('productos','ProductosController');
        Route::get('admin/productos/{id}/destroy',[
            'uses'=>'ProductosController@destroy',
            'as'=>'admin.productos.destroy'
        ]);

        //fin de productos
//ventas
        Route::resource('ventas','FacturaVentaController');
        Route::get('admin/ventas/{id}/report',[
            'uses'=>'FacturaVentaController@report',
            'as'=>'admin.ventas.report'
        ]);
        Route::get('admin/ventas/details',[
            'uses'=>'FacturaVentaController@details',
            'as'=>'admin.ventas.details'
        ]);

        Route::get('admin/ventas/{id}/destroy',[
            'uses'=>'FacturaVentaController@destroy',
            'as'=>'admin.ventas.destroy'
        ]);

        Route::get('admin/ventas/{id}/devol',[
            'uses'=>'FacturaVentaController@devol',
            'as'=>'admin.ventas.devol'
        ]);

//fin de ventas


//inicio compra
        Route::resource('compra','FacturaCompraController');   
        Route::get('compra/{id}', 'FacturaCompraController@getProductos')->name('compr');
            

        //Route::post('prueba{id}','FacturaCompraController@getProducto')->name('prueba');
        Route::get('admin/compra/{id}/report',[
            'uses'=>'FacturaCompraController@report',
            'as'=>'admin.compra.report'
        ]);

        Route::get('admin/compra/{id}/destroy',[
            'uses'=>'FacturaCompraController@destroy',
            'as'=>'admin.compra.destroy'
        ]);

        Route::get('admin/compra/{id}/devol',[
            'uses'=>'FacturaCompraController@devol',
            'as'=>'admin.compra.devol'
        ]);

        Route::get('admin/compra/reports',[
            'uses'=>'FacturaCompraController@reports',
            'as'=>'admin.compra.reports'
        ]);
        Route::resource('detalleVenta','DetalleFacturaVentaController');
       
//fin compra

//Reportes
        Route::resource('reportes','ReporteController');
        Route::get('admin/reportes/reportsProducto',[
            'uses'=>'ReporteController@reportsProduc',
            'as'=>'admin.reportes.reportsProducto'
        ]);

        Route::get('admin/reportes/productos',[
            'uses'=>'ReporteController@producto',
            'as'=>'admin.reportes.producto'
        ]);
        Route::get('admin/reportes/venta',[
            'uses'=>'ReporteController@venta',
            'as'=>'admin.reportes.venta'
        ]);
        

        Route::get('admin/reportes/reporteVenta',[
            'uses'=>'ReporteController@reporteVenta',
            'as'=>'admin.reportes.reportsVenta'
        ]);

        Route::get('admin/reportes/compra',[
            'uses'=>'ReporteController@compra',
            'as'=>'admin.reportes.compra'
        ]);

        Route::get('admin/reportes/reportsCompra',[
            'uses'=>'ReporteController@reportCompra',
            'as'=>'admin.reportes.reportsCompra'
        ]);

        Route::get('admin/reportes/reportsExcelCompra',[
            'uses'=>'ReporteController@excelCompra',
            'as'=>'admin.reportes.excelReporteCompra'
        ]);

        Route::get('admin/reportes/reportsExcelVenta',[
            'uses'=>'ReporteController@excelVenta',
            'as'=>'admin.reportes.excelReporteVenta'
        ]);

        Route::get('admin/reportes/reportsExcelProducto',[
            'uses'=>'ReporteController@excelProducto',
            'as'=>'admin.reportes.excelReporteProducto'
        ]);
        

    });

  //  Route::group(['middleware'=>'Vendedor'],function(){

    Route::resource('cliente','ClienteController');
    Route::get('admin/cliente/{id}/destroy',[
        'uses'=>'ClienteController@destroy',
        'as'=>'admin.clientes.destroy'
    ]);
    Route::resource('proveedores','ProveedorController');
    Route::get('admin/proveedor/{id}/destroy',[
    'uses'=>'ProveedorController@destroy',
    'as'=>'admin.proveedores.destroy'
    ]);

        //productos
        Route::resource('productos','ProductosController');
        Route::get('admin/productos/{id}/destroy',[
            'uses'=>'ProductosController@destroy',
            'as'=>'admin.productos.destroy'
        ]);

        //fin de productos


        //compras
        Route::resource('compra','FacturaCompraController');   
        Route::get('admin/compra/{id}/report',[
            'uses'=>'FacturaCompraController@report',
            'as'=>'admin.compra.report'
        ]);

        Route::get('admin/compra/reports',[
            'uses'=>'FacturaCompraController@reports',
            'as'=>'admin.compra.reports'
        ]);
        
        Route::resource('detalleVenta','DetalleFacturaVentaController');


//Reportes
Route::resource('reportes','ReporteController')->middleware('Vendedor')->middleware('Gerente');
Route::get('admin/reportes/reportsProducto',[
    'uses'=>'ReporteController@reportsProduc',
    'as'=>'admin.reportes.reporteProducto'
]);

Route::get('admin/reportes/productos',[
    'uses'=>'ReporteController@producto',
    'as'=>'admin.reportes.producto'
]);
Route::get('admin/reportes/venta',[
    'uses'=>'ReporteController@venta',
    'as'=>'admin.reportes.venta'
]);

Route::get('admin/reportes/compra',[
    'uses'=>'ReporteController@compra',
    'as'=>'admin.reportes.compra'
]);

Route::get('admin/reportes/reporteVenta',[
    'uses'=>'ReporteController@reporteVenta',
    'as'=>'admin.reportes.reportsVenta'
]);


Route::get('admin/reportes/reportsCompra',[
    'uses'=>'ReporteController@reportCompra',
    'as'=>'admin.reportes.reportsCompra'
]);

Route::get('admin/reportes/reportsExcelCompra',[
    'uses'=>'ReporteController@excelCompra',
    'as'=>'admin.reportes.excelReporteCompra'
]);

Route::get('admin/reportes/reportsExcelVenta',[
    'uses'=>'ReporteController@excelVenta',
    'as'=>'admin.reportes.excelReporteVenta'
]);

Route::get('admin/reportes/reportsExcelProducto',[
    'uses'=>'ReporteController@excelProducto',
    'as'=>'admin.reportes.excelReporteProducto'
]);

        //ventas
        Route::resource('ventas','FacturaVentaController');
        Route::get('admin/ventas/{id}/report',[
            'uses'=>'FacturaVentaController@report',
            'as'=>'admin.ventas.report'
        ]);
        Route::get('admin/ventas/details',[
            'uses'=>'FacturaVentaController@details',
            'as'=>'admin.ventas.details'
        ]);

        Route::resource('categorias','CategoriaController');
        Route::get('admin/categoria/{id}/destroy',[
            'uses'=>'CategoriaController@destroy',
            'as'=>'admin.categorias.destroy'
        ]);

        Route::resource('marcas','MarcaController');
        Route::get('admin/marcas/{id}/destroy',[
            'uses'=>'MarcaController@destroy',
            'as'=>'admin.marcas.destroy'
        ]);

//fin de ventas
   
    //});
});


