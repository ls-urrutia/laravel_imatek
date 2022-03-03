<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\User2Controller;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ProveedoreController;
use Haruncpi\LaravelUserActivity\Controllers\ActivityController;

use App\Http\Controllers\MantencioneController;
use Illuminate\Http\Request;

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

/* Route::get('/', function () {
  dasdsa  ;
}); */

    Route::get('/', function () {
   
        /* return view('/dashboard'); */
        return view('auth.login');
    });


/* Route::get('register',[HomeController::class,'register']); */


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::resource('centros',CentroController::class);

Route::resource('proveedores',ProveedoreController::class);

Route::resource('equipos',EquipoController::class)->middleware('can:Ver lista de equipos');

Route::resource('mantenciones',MantencioneController::class)->middleware('can:Ver lista de mantenciones');

Route::resource('users2',User2Controller::class)->middleware('can:Ver lista de usuarios');
Route::resource('users',UserController::class)->middleware('can:Ver lista de usuarios');

Route::resource('movimientos',MovimientoController::class)->middleware('can:Ver lista de movimientos');
Route::get(config('user-activity.route_path'), 'ActivityController@getIndex')->middleware('can:Ver lista de eq');
/* Route::get('/perro',[ActivityController::class,'user-activity']); */

/* Route::get('users2',[User2Controller::class,'ubicacion']); */

Route::resource('roles', roleController::class)->middleware('can:Ver roles');
Route::resource('clientes','\App\Http\Controllers\ClienteController')->middleware('can:Ver lista de clientes');

Route::get('dashboard',[EquipoController::class,'mostrar'])->middleware('can:Ver dashboard');

/* Route::get('add-to-log', 'HomeController@myTestAddToLog'); */
Route::get('add-to-log',[HomeController::class,'add-to-log']);
Route::get('logActivity',[HomeController::class,'logActivity']);
/* Route::get('logActivity', 'HomeController@logActivity'); */

Route::put('dashboard/{validacion}/validar/{id_equipo}', [MantencioneController::class,'validacion']);

Route::get('movimiento/{id_equipo}/fechas','App\Http\Controllers\MovimientoController@fechas');

Route::get('/movimiento/{tipo_m}/equipos','App\Http\Controllers\EquipoController@byEquipo');



Route::get('/movimiento/{id_cliente}/centros','App\Http\Controllers\MovimientoController@centros');


Route::group([
    'namespace' => '\Haruncpi\LaravelUserActivity\Controllers',
    'middleware' => config('user-activity.middleware'),
], function () {
    Route::get(config('user-activity.route_path'), 'ActivityController@getIndex')->middleware('can:Ver actividad de usuario');
    Route::post(config('user-activity.route_path'), 'ActivityController@handlePostRequest')->middleware('can:Ver actividad de usuario');
});




/* Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return view('dash.index');
})->name('dash');



Route::get('dash', '\App\Http\Controllers\DashboardController@index'); */

/* Route::get('/dash/crud', function () {
    return view('crud.index');
});
Route::get('/dash/crud/create', function () {
    return view('crud.create');
}); */
