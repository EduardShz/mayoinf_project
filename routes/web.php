<?php

use App\Http\Controllers\Dashboard\MarcasController;
use App\Http\Controllers\Dashboard\EmpresasController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
