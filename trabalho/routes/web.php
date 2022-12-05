<?php

use App\Http\Controllers\fichaController;
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
use App\Http\Controllers\treinoController;

use App\Http\Controllers\EventController;
Route::group(['middleware' => ['web']], function () {
    return view('index');
});

Route::get('/', [EventController::class, 'index']);
Route::delete('/treino/delete/{id}/{treino_id}', [treinoController::class, 'destroy'])->middleware('auth');
Route::get('/treino/edit/{id}/{treino_id}', [treinoController::class, 'edit'])->middleware('auth');
Route::delete('/ficha/delete/{id}', [fichaController::class, 'destroy'])->middleware('auth');

Route::put('/treino/update/{id}/{treino_id}', [treinoController::class, 'update'])->middleware('auth');
Route::get('/dashboard', [fichaController::class, 'dashboard'])->middleware('auth');


Route::get('/ficha/create', [fichaController::class, 'create']);
Route::get('/ficha/{id}' ,[fichaController::class, 'treino_create'])->middleware('auth');;//cria treinos ficha
Route::post('/ficha', [fichaController::class, 'store']);
Route::post('/treinos/inserir/{id}', [treinoController::class, 'store'])->middleware('auth');




Route::get('/contact', function () {
    return view('contact');
});


Route::post('/ficha/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

Route::delete('/ficha/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');
