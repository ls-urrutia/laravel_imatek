<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\User2Controller;
use App\Http\Controllers\EquipoController;
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

Route::resource('centros',CentroController::class);

Route::resource('equipos',EquipoController::class);

Route::resource('mantenciones',MantencioneController::class);


Route::resource('articulos','\App\Http\Controllers\ArticuloController');

Route::resource('users',UserController::class);

Route::resource('users2',User2Controller::class);

Route::resource('clientes','\App\Http\Controllers\ClienteController');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');





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
