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
	//index Usuario
	Route::get('/listar/',[
		'as'=>'admin.users.listar',
		'uses'=>'DataTablesController@listarUsers'
		]);
	//Buscar usuario ajax
	Route::post('/users/buscar','UsersController@buscarUsersAjax');	


	Route::post('/users/buscar/inflabo','UsersController@buscarUsersInfoLabo');		

	//Agregar  informacion personal del usuario
	Route::post('/users/agregarinflabo/{id}',[
		'as'=>'admin.users.agregarinflabo',
		'uses'=>'UsersController@agregarinflabo'
		]);

	//Editar  informacion personal del usuario
	Route::get('/users/update/infLa/{id}',[
		'as'=>'admin.users.editarinflabo',
		'uses'=>'UsersController@editarinflabo'
		]);

	//Actualizar  informacion laboral del usuario
	Route::post('/users/updateper/{id}',[
		'as'=>'admin.users.updateper',
		'uses'=>'UsersController@updateInfPersonal'
		]);

	
	//Ingresos
	Route::resource('ingresos','IngresosController');
	Route::get('/ingresos/create/{id}','IngresosController@create');
	Route::post('/ingresos/store/','IngresosController@store');

	//admin
	Route::get('/admin/ingresos/show/','AdminController@indexIngresos');
	





		 	


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