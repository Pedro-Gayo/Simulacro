<?php

use App\Http\Controllers\LibrosController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/borrar', function () {
    return view('borrar');
});

Route::get('/lista', [LibrosController::class,'allBooks'])->name('list');

Route::post('/lista', [LibrosController::class,'addBooks'])->name('add');

Route::post('/borrar', [LibrosController::class,'delete'])->name('delete')->middleware(libros::class);

Route::get('/listaFiltrada', [LibrosController::class,'filtrado'])->name('filtrar');

Route::post('/modificarEstado/{id}', [LibrosController::class,'modify'])->name('modify');

Route::get('/error', function () {
    return view('error');
});
?>
