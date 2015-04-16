<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/



//creamos las rutas nuevas que tendran en cuenta los controllers 

Route::resource('fabricantes','FabricanteController',['except'=>['create']]);
Route::resource('aviones','AvionController',['only'=>['index','show']]);

Route::get('/', function(){
	return "Bienvenido API RESTFUL AVIONES";
});


//recurso anindado /fabricantes/xx/aviones
Route::resource('fabricantes.aviones','FabricanteAvionController',['except'=>['edit','create','show']]);

