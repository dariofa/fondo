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

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
	//Usuarios
	Route::resource('users','UsersController');
	 
	
	//index Usuario buscado por ajax con datatables 
	Route::get('/listar/users/',[
		'as'=>'admin.users.listar.user',
		'uses'=>'DataTablesController@listarUsers'
		]);
	//index tipos movimientosbuscado por ajax con datatables
	Route::get('/listar/tiposIn/',[
		'as'=>'admin.users.listar.tipo',
		'uses'=>'DataTablesController@listarTiposIngresos'
		]);
	//index tipo de cuentas buscado por ajax con datatables
	Route::get('/listar/tiposCuentas/',[
		'as'=>'admin.users.listar.cuentas',
		'uses'=>'DataTablesController@listarTiposCuentas'
		]);
	//index tipo de creditos buscado por ajax con datatables
	Route::get('/listar/tiposCreditos/',[
		'as'=>'admin.users.listar.creditos',
		'uses'=>'DataTablesController@listarTiposCreditos'
		]);
	//index tipo de referencias buscado por ajax con datatables
	Route::get('/listar/tiposReferencias/',[
		'as'=>'admin.users.listar.referencias',
		'uses'=>'DataTablesController@listarTiposReferencias'
		]);
	//Buscar usuario ajax para una nueva cuenta
	Route::post('/users/buscar','UsersController@buscarUsersAjax');	
	//Agregar un usuario via ajax pára una nueva cuenta
	Route::post('/users/store/ajax/','UsersController@storeAjax');

	//Consulta la informacionn laboral de un usuario
	Route::post('/users/buscar/inflabo','UsersController@buscarUsersInfoLabo');		

	//Agregar  informacion laboral del usuario
	Route::post('/users/agregarinflabo/',[
		'as'=>'admin.users.agregarinflabo',
		'uses'=>'UsersController@agregarinflabo'
		]);

	//Actualizar  informacion laboral del usuario
	Route::post('/users/update/infLa',[
		'as'=>'admin.users.editarinflabo',
		'uses'=>'UsersController@editarinflabo'
		]);
	//Eliminar  informacion laboral del usuario
	Route::get('/users/delete/infLa/{id}',[
		'as'=>'admin.users.deleteInfLab',
		'uses'=>'UsersController@eliminarinflabo'
		]);

		//Agregar  informacion profesional del usuario
	Route::post('/users/agregarinfprof/',[
		'as'=>'admin.users.agregarinfprof',
		'uses'=>'UsersController@agregarinfprof'
		]);
	//Consulta la informacionn profesional de un usuario
	Route::post('/users/buscar/infprof','UsersController@buscarUsersInfoProf');		
	//Actualizar  informacion profesional del usuario
	Route::post('/users/update/infprof',[
		'as'=>'admin.users.editarinfprof',
		'uses'=>'UsersController@editarinfprof'
		]);
	//Eliminar  informacion profesional del usuario
	Route::get('/users/delete/infprof/{id}',[
		'as'=>'admin.users.deleteInfProf',
		'uses'=>'UsersController@eliminarinfprof'
		]);

	//Actualizar  informacion personal del usuario
	Route::post('/users/updateper/{id}',[
		'as'=>'admin.users.updateper',
		'uses'=>'UsersController@updateInfPersonal'
		]);

	//listar  bienes del usuario
	Route::resource('bienes','BienesController');
	Route::post('/users/search/bienes',[
		'as'=>'admin.users.search',
		'uses'=>'BienesController@index'
		]);
	//add bienes
	Route::post('/users/add/bien/',[
		'as'=>'admin.users.add',
		'uses'=>'BienesController@store'
		]);
	//actualizar bien
	Route::post('/users/update/bienes',[
		'as'=>'admin.users.update',
		'uses'=>'BienesController@update'
		]);
	//eliminar bien
	Route::get('/users/delete/bien/{id}',[
		'as'=>'admin.users.delete',
		'uses'=>'BienesController@destroy'
		]);
	//Eliminar  usuario
	Route::get('/users/delete/{id}',[
		'as'=>'admin.users.delete',
		'uses'=>'UsersController@destroy'
		]);
 
 
	
	//cuentas
	Route::resource('cuentas','CuentasController');
	Route::get('/cuentas/create/{id}','CuentasController@create');
	Route::post('/cuentas/store/ajax','CuentasController@storeAjax'); 
	Route::get('/cuentas/{id}','CuentasController@show');

	//admin tipos de ingresos Movimientos Cuenta
	Route::resource('tipos/ingresos','IngresosTipoController');
	Route::post('/tipos/ingresos/registrar','IngresosTipoController@store');
	Route::post('/tipos/movimientos/cuenta/buscar','IngresosTipoController@buscarAjax');
	Route::post('/tipos/movimientos/buscar','IngresosTipoController@edit');
	Route::post('/tipos/movimientos/update','IngresosTipoController@update');
	Route::get('/tipos/movimientos/delete/{id}','IngresosTipoController@destroy');
	
	//Tipos de cuentas
	Route::resource('tipos/cuentas','TipoCuentasController');
	Route::post('/tipos/cuentas/store','TipoCuentasController@store'); 
	Route::post('/tipos/cuentas/edit','TipoCuentasController@edit'); 
	Route::post('/tipos/cuentas/update','TipoCuentasController@update');
	Route::get('/tipos/cuentas/delete/{id}','TipoCuentasController@destroy'); 
	

	//Tipos de creditos
	Route::resource('tipos/creditos','CreditosTipoController');
	Route::post('/tipos/creditos/store','CreditosTipoController@store');
	Route::post('/tipos/interes/buscar/tasa/','CreditosTipoController@searchTasa');
	Route::post('/tipos/creditos/edit/','CreditosTipoController@edit'); 
	Route::post('/tipos/creditos/update/','CreditosTipoController@update'); 
	Route::get('/tipos/creditos/delete/{id}','CreditosTipoController@destroy'); 
	 
	//Tipos de referencias
	Route::resource('tipos/referencias','ReferenciasTipoController');
	Route::post('/tipos/referencias/store','ReferenciasTipoController@store'); 
	Route::get('/tipos/referencias/',[
		'as'=>'tipos.referencias.index',
		'uses' => 'ReferenciasTipoController@index'
		]); 
	Route::post('/tipos/referencias/edit','ReferenciasTipoController@edit'); 
	Route::post('/tipos/referencias/update','ReferenciasTipoController@update'); 
	Route::get('/tipos/referencias/delete/{id}','ReferenciasTipoController@destroy'); 
	
	//Movimientos Cuentas o Movimientos
	Route::resource('ingresos/cuentas','IngresosCuentasController');
	Route::get('/ingresos/add/{num_cuenta}',[
		'as'=>'admin.ingresos.add',
		'uses'=>'IngresosCuentasController@create'
		]);
	Route::get('/cuentas/movimientos/view/{id}','IngresosCuentasController@show');

	//Movimientos Creditos o Ingresos
	Route::resource('ingresos/creditos','MovimientosCreditosController');
	Route::get('/ingresos/creditos/view/{id}','MovimientosCreditosController@show');
	Route::put('/ingresos/creditos/update/','MovimientosCreditosController@update');


	
	//creditos
	Route::resource('creditos','CreditosController');
	Route::get('/creditos/create/{id}','CreditosController@create');
	Route::get('/creditos/change/status/{id}/{status}','CreditosController@changeStatus');
	Route::get('/creditos/ver/{id}','CreditosController@ver'); 
	//Route::get('/creditos/{id}','CreditosController@show');

	//referencias creditos
	Route::resource('referencias','ReferenciasController');
	Route::get('/referencias/create/{id}',[
		'as'=>'admin.referencias.create',
		'uses'=> 'ReferenciasController@create'
		]);
	Route::post('/referencias/buscar','ReferenciasController@searchAjax');
	Route::get('/referencias/delete/{idRef}/{idCre}','ReferenciasController@delete');
	Route::post('/referencias/update/{id}','ReferenciasController@update');
	Route::get('/referencias/view/{id}','ReferenciasController@show');
	Route::get('/referencias/delete/{id}','ReferenciasController@destroy');

	//Route::post('/referencias/store/ajax','ReferenciasController@storeAjax'); 
	//Route::get('/referencias/{id}','ReferenciasController@show');
	//pdf
	Route::get('/reportes/credito/{id}','PdfController@reporteCredito');
	Route::get('/reportes/cuenta/movimientos/{id}','PdfController@reporteMoviCuenta');
	
	//Fondos
	Route::resource('/fondos','FondosController');

	//Proyeccion
	Route::resource('/proyeccion','ProyeccionController');




		 	


});
//Login Route
Route::get('auth/register',function(){
	 return view('auth.register');
});
Route::get('auth/login',function(){
	 return view('auth.login');
});
///////////////////////////////////
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });
	//Route::resource('users','UsersController');
    

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
/*
Auth::routes();

Route::get('/home', 'HomeController@index');
*/