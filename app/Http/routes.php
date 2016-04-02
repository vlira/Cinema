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
/*
Route::get('controlador','PruebaController@index');
Route::get('name/{nombre}','PruebaController@nombre');

Route::resource('movie','MovieController');


//Ruta sin parametros
Route::get('prueba',function(){
	return "Hola desde routes.php";
});

//Ruta con parametros desde la url
Route::get('nombre/{nombre}', function($nombre){
	return "Mi nombre es ".$nombre;
});

//Ruta con parametros desde la url el {edad?} es que puede o no dar los datos, sino los da, se muestra el 26 que está definido por default
Route::get('edad/{edad?}', function($edad=26){
	return "Mi edad es ".$edad;
});

Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','FrontController@index');
Route::get('contacto','FrontController@contacto');
Route::get('reviews','FrontController@reviews');