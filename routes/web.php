<?php


use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\RentasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('showRegister', 'Auth\RegisterController@showRegistrationForm')->name('showRegister');
Route::post('registerUser', 'Auth\RegisterController@registerUser')->name('registerUser');

///Route to retrieve movies and show view
Route::get('peliculas', [PeliculasController::class, 'index']);
///Route to show view to create a new movie
Route::get('peliculasCreate', [PeliculasController::class, 'create'])->name('peliculasCreate');
///Route to store a new movie
Route::post('peliculas', [PeliculasController::class, 'store'])->name('peliculasStore');
///Route to show view to edit a movie
Route::get('peliculas/{pelicula}', [PeliculasController::class, 'edit'])->name('peliculasEdit');
///Route to update a movie
Route::put('peliculas/{pelicula}', [PeliculasController::class, 'update'])->name('peliculasUpdate');
///Route to delete a movie
Route::delete('peliculas/{pelicula}', [PeliculasController::class, 'destroy'])->name('peliculasDestroy');
//Route to rent a movie
Route::get('peliculas/{pelicula}/renta', [RentasController::class, 'renta'])->name('nuevaRenta');
//Route to store a rent
Route::post('rentas', [RentasController::class, 'store'])->name('rentasStore');
//Route to view all of the user rents
Route::get('rentas', [RentasController::class, 'showRentas'])->name('rentasIndex');
Route::post('rentas/{renta}', [RentasController::class, 'devolver'])->name('rentasDevolver');
//Route to view users
Route::get('/users', [UserController::class, 'users'])->name('usersIndex');
//Route to switch role
Route::post('/users/{user}', [UserController::class, 'switchRole'])->name('switchRole');



Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
