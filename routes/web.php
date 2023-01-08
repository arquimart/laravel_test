<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuario_controller;
use App\Http\Controllers\Categorias_controller;
use App\Http\Controllers\Rol_usuario_controller;
use App\Http\Controllers\Peliculas_controller;

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

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('registro', [Usuario_controller::class,"create"])->name("user.create");
Route::post('registro', [Usuario_controller::class,"store"])->name("user.store");


Route::get('menu1', function(){
	return view('menu1.index');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/roles', [Rol_usuario_controller::class,"index"])->name('roles.index');
Route::get('/rolesActualizar/{id}', [Rol_usuario_controller::class,"edit"])->name('roles.edit');
Route::post('/rolesModificar/{id}', [Rol_usuario_controller::class,"update"])->name('roles.update');


Route::get('/categorias', [Categorias_controller::class,"index"])->name('categorias.index');
Route::post('/categorias', [Categorias_controller::class,"store"])->name('categorias.store');
Route::post('/categorias/{id}', [Categorias_controller::class,"update"])->name('categorias.update');

Route::get('/peliculas', [Peliculas_controller::class,"index"])->name('peliculas.index');
Route::get('/peliculasAdmin', [Peliculas_controller::class,"indexAdmin"])->name('peliculas.admin');


