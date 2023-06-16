<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerProducto;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

//modulo inicio
Route::get('/', [ControllerProducto::class, 'index'])->name('pro.index');

//modulo de producto
Route::get('/adminProductos', [ControllerProducto::class, 'adminProductos'])->name('pro.adminProductos');

//boton nuevoProducto
Route::get('/nuevoProducto', [ControllerProducto::class, 'nuevoProducto'])->name('pro.nuevoProducto');

Route::post('/nuevoRegistroProducto', [ControllerProducto::class, 'nuevoRegistroProducto'])->name('pro.nuevoRegistroProducto');
