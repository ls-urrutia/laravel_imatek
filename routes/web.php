<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\User2Controller;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\HomeController;







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
  dasdsa  return view('auth.login');
}); */

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('centros',CentroController::class);

Route::resource('equipos',EquipoController::class)->middleware('can:Ver lista de equipos');

Route::resource('mantenciones',MantencioneController::class)->middleware('can:Ver lista de mantenciones');


Route::resource('users',UserController::class)->middleware('can:Ver lista de usuarios');

Route::resource('movimientos',MovimientoController::class)->middleware('can:Ver lista de movimientos');

Route::resource('users2',User2Controller::class);
Route::resource('roles', roleController::class);
Route::resource('clientes','\App\Http\Controllers\ClienteController');

Route::get('dashboard',[EquipoController::class,'mostrar']);

/* Route::get('add-to-log', 'HomeController@myTestAddToLog'); */
Route::get('add-to-log',[HomeController::class,'add-to-log']);
Route::get('logActivity',[HomeController::class,'logActivity']);
/* Route::get('logActivity', 'HomeController@logActivity'); */









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
