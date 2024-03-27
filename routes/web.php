<?php

use App\Http\Controllers\Dashboard\MarcasController;
use App\Http\Controllers\Dashboard\EmpresasController;
use App\Http\Controllers\Dashboard\ServiciosController;
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
})->name('bienvenida');

Route::resource('marca', MarcasController::class);

Route::resource('empresa', EmpresasController::class);

/*Route::get('marca', [MarcasController::class,'index']);
Route::get('marca/{post}', [MarcasController::class,'show']);
Route::get('marca/create', [MarcasController::class,'create']);
Route::get('marca/{marca}/edit', [MarcasController::class,'edit']);

Route::post('marca', [MarcasController::class,'store']);
Route::post('marca/{marca}', [MarcasController::class,'update']);
Route::delete('marca/{marca}', [MarcasController::class,'delete']);*/
Auth::routes();

Route::get('/mainmenu', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/servicios/{id}/show/pdf', [ServiciosController::class, 'pdf'])->name('servicios.showpdf');
Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
Route::get('/servicios/create', [ServiciosController::class, 'create'])->name('servicios.create');
Route::post('/servicios/store', [ServiciosController::class, 'store'])->name('servicios.store');
Route::get('/servicios/{id}/edit', [ServiciosController::class, 'edit'])->name('servicios.edit');
Route::put('/servicios/update/{servicios}', [ServiciosController::class, 'update'])->name('servicios.update');
Route::get('/servicios/{id}/show', [ServiciosController::class, 'show'])->name('servicios.show');
Route::get('/servicios/{id}/destroy', [ServiciosController::class, 'destroy'])->name('servicios.destroy');
Route::get('/servicios/modusuarioedit', [ServiciosController::class, 'moduser'])->name('servmoduseredit');
Route::get('/servicios/modusuario', [ServiciosController::class, 'moduser'])->name('servmoduser');
Route::get('/servicios/modunidad', [ServiciosController::class, 'moduser'])->name('servmodunit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
