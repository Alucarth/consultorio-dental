<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::resource('personas','PersonaController');

Route::get('saludar','controlador@mostrarformulario');
Route::post('saludar','controlador@hola');


Route::get('/', function () {
    return view('welcome');
});

Route::get('android', 'AndroidController@citas')->middleware('auth.basic');


Route::get('test', function () {
    return view('admin_template');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
   

Route::resource('pacientes','PacienteController');
Route::resource('citas','CitaController');
Route::resource('odontograma','OdontogramaController');

Route::get('/home', 'HomeController@index');

Route::get('paciente/historial/{id}','PacienteController@historial');

Route::get('paciente/odontograma/{id}','PacienteController@odontograma');
Route::get('paciente/anamnesis/{id}','PacienteController@anamnesis');
Route::get('paciente/tratamientos/{id}','PacienteController@tratamientos');
Route::get('paciente/pagos/{id}','PacienteController@pagos');

Route::post('anamnesis','PacienteController@storeAnamnesis');
Route::post('tratamientos','PacienteController@storeTratamientos');
Route::post('pagos','PacienteController@storePagos');

Route::resource('odontologos','OdontologoController');

//reportes rutas

Route::get('reporte_historial/{id}','PacienteController@reporte_historial');


});

