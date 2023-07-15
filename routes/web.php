<?php

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CajaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

Route::resource('productos', App\Http\Controllers\ProductoController::class)->middleware('auth');
Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware('auth');
Route::resource('ventas', App\Http\Controllers\VentaController::class)->middleware('auth');
Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('proveedores', App\Http\Controllers\ProveedorController::class)->middleware('auth');
Route::resource('cajas', App\Http\Controllers\CajaController::class)->middleware('auth');


Route::group(['prefix' => 'cajas'], function () {
    // Ruta para mostrar el formulario de apertura de caja
    Route::get('/apertura', 'CajaController@apertura')->name('cajas.apertura')->middleware('auth');
    
    // Ruta para procesar el formulario de apertura de caja
    Route::post('/abrir', 'CajaController@abrir')->name('cajas.abrir')->middleware('auth');
    
    // Ruta para mostrar el formulario de cierre de caja
    Route::get('/cierre/{id}', [CajaController::class, 'cierre'])->name('cajas.cierre')->middleware('auth');
    
    // Ruta para procesar el formulario de cierre de caja
    Route::post('/cerrar', 'CajaController@cerrar')->name('cajas.cerrar')->middleware('auth');
    
    // Ruta para mostrar el balance de la caja
    Route::get('/balance', 'CajaController@balance')->name('cajas.balance')->middleware('auth');
});



Route::get('/ventas/{id}/exportar-pdf', 'App\Http\Controllers\VentaController@exportarPDF')->name('ventas.exportar.pdf');






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
